var EditableTable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '" readonly>';
                jqTds[1].innerHTML = '<input type="text" class="name form-control small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = select;
                $(".state").val(aData[2]);
                selectedstate = aData[2];
                //jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<a class="edit" href="javascript:;">Save</a>';
                jqTds[4].innerHTML = '<a class="cancel" href="javascript:;">Cancel</a>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                var temp = {};
                temp.value = selectedstate;
                jqInputs.push(temp);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate('<a class="edit" href="javascript:;">Edit</a>', nRow, 3, false);
                oTable.fnUpdate('<a class="delete" href="javascript:;">Delete</a>', nRow, 4, false);
                oTable.fnDraw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate('<a class="edit" href="javascript:;">Edit</a>', nRow, 3, false);
                oTable.fnDraw();
            }

            var oTable = $('#editable-sample').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#editable-sample_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('#editable-sample_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#editable-sample_new').click(function (e) {
                e.preventDefault();
                if(nEditing!=null){
                    return;
                }
                selectedstate = "";
                var aiNew = oTable.fnAddData(['', '', '',
                        '<a class="edit" href="javascript:;">Edit</a>', '<a class="cancel" data-mode="new" href="javascript:;">Cancel</a>'
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#editable-sample a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }

                var nRow = $(this).parents('tr')[0];
                var aData = oTable.fnGetData(nRow);                
                $.ajax({
                    url : "../cities/delete",
                    type : "post",
                    data : "id="+aData[0],
                    success : function(res){
                        var response = $.parseJSON(res);                        
                        if(response.message == "success"){
                            oTable.fnDeleteRow(nRow);
                        }else{
                            alert(response.message);
                        }
                    },
                    err : function(err){
                        alert("Error Deleting State! Please try again later");
                    }
                });
            });

            $('#editable-sample a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#editable-sample a.edit').live('click', function (e) {
                e.preventDefault();
                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {
                     if($(".name").val().trim() == ""){
                        alert("Please Enter City Name");
                        return;
                    }
                    else if(selectedstate.trim() == ""){
                        alert("Please Select State");
                        return;
                    }
                    /* Editing this row and want to save it */  
                    saveRow(oTable, nEditing);
                    nEditing = null;                  
                    var aData = oTable.fnGetData(nRow);                
                    $.ajax({
                        url : "../cities/update",
                        type : "post",
                        data : "id="+aData[0]+"&name="+aData[1]+"&state="+selectedstate,
                        success : function(res){
                            var response = $.parseJSON(res);                        
                            if(response.message == "success"){
                            }else{
                                alert(response.message);
                            }
                        },
                        err : function(err){
                            alert("Error Deleting State! Please try again later");
                        }
                    });
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();