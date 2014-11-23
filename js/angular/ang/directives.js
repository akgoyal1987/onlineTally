'use strict';

/* Directives */


angular.module('myApp.directives', []).
  directive('appVersion', ['version', function(version) {
    return function(scope, elm, attrs) {
      elm.text(version);
    };
  }])
  .directive('raty', function() {
	  return function(scope, element, attrs) {
      element.raty({
        score     : attrs['value']?attrs['value']:0,
        path      : '/demo/images',
        cancel    : true,
        cancelOff : 'cancel-off.png',
        cancelOn  : 'cancel-on.png',
        half      : false,
        size      : 24,
        starHalf  : 'star-half.png',
        starOff   : 'star-off.png',
        starOn    : 'star-on.png'
      });
	  }
	})
  .directive('datepicker', function() {
    return function(scope, element, attrs) {
      element.datepicker({
        format: 'yyyy-mm-dd'
      }); 
    }
  })
  .directive('nicescroll', function() {
    return function(scope, element, attrs) {
      element.niceScroll(
        {styler:"fb",cursorcolor:"#65cea7", cursorwidth: '6', cursorborderradius: '0px', background: '#424f63', spacebarenabled:false, cursorborder: '0',  zindex: '1000'}
      );
    }
  })
  .directive('simplecropper', function() {
    return function(scope, element, attrs) {
      element.simplecropper();
    }
  })
  .directive('searchbox', function() {
    return function(scope, element, attrs) {
        element.ajaxsearchbox({
            serviceUrl: '/searchProjectSuggestions'
            // onSelect: function (suggestion) {
            //     alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            //     scope.search(suggestion.value);
            // }
        });
    }
  })
  
  .directive('projectsearchbox', ['$compile', 'sharedProperties', function($compile, sharedProperties) {
    return function(scope, element, attrs) {
      console.log('from here',sharedProperties.getProjectAtt());
        element.ajaxsearchbox({
            serviceUrl: '/searchProjectSuggestions?projectId='+sharedProperties.getProjectAtt().id,
            onSelect: function (suggestion) {
                //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            }
        });
    }
  }])
  .directive('tagit', function() {
    return function(scope, element, attrs) {
      console.log(attrs['source']);
      element.tagit({
          availableTags: scope[attrs['source']]
          ,singleField: true
          ,singleFieldNode: $('#'+attrs['targetitem'])
      });
    }
  })
  .directive('fileupload', function() {
    return function(scope, element, attrs) {
        element.fileupload({
            // This element will accept file drag/drop uploading
          dropZone: element.children('#drop'),
          replaceFileInput: false,

          // This function is called when a file is added to the queue;
          // either via the browse button, or via drag/drop:
          add: function (e, data) {
              var i  = 0;
              var ul = element.children('ul');
              function formatFileSize(bytes) {
                  if (typeof bytes !== 'number') {
                      return '';
                  }

                  if (bytes >= 1000000000) {
                      return (bytes / 1000000000).toFixed(2) + ' GB';
                  }

                  if (bytes >= 1000000) {
                      return (bytes / 1000000).toFixed(2) + ' MB';
                  }

                  return (bytes / 1000).toFixed(2) + ' KB';
              }
              var tpl = $('<li class="working"><input type="text" value="0" data-width="48" data-height="48"'+
                  ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');

              // Append the file name and file size
              tpl.find('p').text(data.files[0].name)
                           .append('<i>' + formatFileSize(data.files[0].size) + '</i>');              
              // Add the HTML to the UL element
              scope.fileuploads.push(data.files[0]);

              data.context = tpl.appendTo(ul);

              // Initialize the knob plugin
              tpl.find('input').knob(data.files[0].name);

              // Listen for clicks on the cancel icon
              tpl.find('span').click(function(){

                  if(tpl.hasClass('working')){

                      jqXHR.abort();
                  }

                  tpl.fadeOut(function(){
                      tpl.remove();
                      console.log("Index is = ", scope.fileuploads.indexOf(data.files[0]), "and File Name is =", data.files[0].name);
                      scope.fileuploads.splice(scope.fileuploads.indexOf(data.files[0]),1);
                  });

              });

              // Automatically upload the file once it is added to the queue
              var jqXHR = data.submit();
          },

          progress: function(e, data){

              // Calculate the completion percentage of the upload
              var progress = parseInt(data.loaded / data.total * 100, 10);

              // Update the hidden input field and trigger a change
              // so that the jQuery knob plugin knows to update the dial
              data.context.find('input').val(progress).change();

              if(progress == 100){
                  data.context.removeClass('working');

                  filename=data.files[0].name;

                  data.context.find("canvas").replaceWith($('<i class="fa '+scope.getIconClass(filename)+' fa-3x">'));

                  filepath=UPLOAD_PATH+"/"+data.files[0].name;
              }
          },

          fail:function(e, data){
              // Something has gone wrong!
              data.context.addClass('error');
          },          
        });
    }
  })
  .directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files);
                });
            });
        }
    };
  }])
  .directive("scrollTo", ["$window", function($window){
    return {
      restrict : "AC",
      compile : function(){

        var document = $window.document;
        
        function scrollInto(idOrName) {//find element with the give id of name and scroll to the first element it finds
          if(!idOrName)
            $window.scrollTo(0, 0);
          //check if an element can be found with id attribute
          var el = document.getElementById(idOrName);
          if(!el) {//check if an element can be found with name attribute if there is no such id
            el = document.getElementsByName(idOrName);

            if(el && el.length)
              el = el[0];
            else
              el = null;
          }

          if(el) //if an element is found, scroll to the element
            el.scrollIntoView();
          //otherwise, ignore
        }

        return function(scope, element, attr) {
          element.bind("click", function(event){
            scrollInto(attr.scrollTo);
          });
        };
      }
    };
  }])
	.directive('scrollToBookmark', function() {
	    return {
	      link: function(scope, element, attrs) {
	        var value = attrs.scrollToBookmark;
	        element.click(function() {
	          scope.$apply(function() {
	            var selector = "[scroll-bookmark='"+ value +"']";
	            var element = $(selector);
	            if(element.length)
	              $('html, body').animate({scrollTop: (element.offset().top)-40}, 1000);  // Don't want the top to be the exact element, -100 will go to the top for a little bit more
	          });
	        });
	      }
	    };
	})
  .directive('dynamic', function ($compile) {
    return {
      restrict: 'A',
      replace: true,
      link: function (scope, ele, attrs) {
        scope.$watch(attrs.dynamic, function(html) {
          ele.html(html);
          $compile(ele.contents())(scope);
        });
      }
    };
  })
  .directive('msdropdown', function() {
    return function(scope, element, attrs) {
      element.msDropdown({
        roundedBorder     : attrs['roundedBorder']?attrs['roundedBorder']:false            
      });
    }
  })
  .directive('wysihtml5', function() {
    return function(scope, element, attrs) {
      element.wysihtml5();
    }
  })
  .directive('dcaccordion', function() {
    return function(scope, element, attrs) {
      element.dcAccordion({
          eventType: 'click',
          autoClose: true,
          saveState: true,
          disableLink: true,
          speed: 'slow',
          showCount: false,
          autoExpand: true,
          classExpand: 'dcjq-current-parent'
      });
    }
  })
  .directive('slimscroll', function() {
    return function(scope, element, attrs) {
      element.slimscroll({
        height: '305px',
        wheelStep: 20
      });
    }
  })
  .directive('niceScroll', function() {
    return function(scope, element, attrs) {
      element.niceScroll({
        cursorcolor: "#1FB5AD",
        cursorborder: "0px solid #fff",
        cursorborderradius: "0px",
        cursorwidth: "3px"
      });
    }
  })
  .directive('tooltip', function() {
    return function(scope, element, attrs) {
      element.tooltip();
    }
  })
  .directive('popover', function() {
    return function(scope, element, attrs) {
      element.popover();
    }
  })
  .directive('easyPieChart', function() {
    return function(scope, element, attrs) {
      element.easyPieChart({
          onStep: function (from, to, percent) {
              $(this.el).find('.percent').text(Math.round(percent));
          },
          barColor: "#39b6ac",
          lineWidth: 3,
          size: 50,
          trackColor: "#efefef",
          scaleColor: "#cccccc"
      });
    }
  })
  .directive('sparkline', function() {
    return function(scope, element, attrs) {
      element.sparkline({
          onStep: function (from, to, percent) {
              $(this.el).find('.percent').text(Math.round(percent));
          },
          barColor: "#39b6ac",
          lineWidth: 3,
          size: 50,
          trackColor: "#efefef",
          scaleColor: "#cccccc"
      });
    }
  })
  .directive('typeahead', function($http) {
    return {      
      link: function(scope, element, attrs) {
        $http.get("../ledger/get")
        .success(function(response){
          console.log(JSON.stringify(response));
          element.typeahead({
            source : response,
            items : 8
          });
        })
        .error(function(error){
          alert(error);
        })
      }
    }
  })
  .directive('customSelect', ['$parse', '$compile', '$timeout', function ($parse, $compile, $timeout, baseOptions) {
    var NG_OPTIONS_REGEXP = /^\s*(.*?)(?:\s+as\s+(.*?))?(?:\s+group\s+by\s+(.*))?\s+for\s+(?:([\$\w][\$\w]*)|(?:\(\s*([\$\w][\$\w]*)\s*,\s*([\$\w][\$\w]*)\s*\)))\s+in\s+(.*?)(?:\s+track\s+by\s+(.*?))?$/;
    var customSelectDefaults = {
      displayText: 'Select...',
      emptyListText: 'There are no items to display',
      emptySearchResultText: 'No results match "$0"',
      addText: 'Add',
      searchDelay: 1000
    };
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, elem, attrs, controller) {
        if (!attrs.ngOptions) {
          throw new Error('Expected ng-options attribute.');
        }

        var match = attrs.ngOptions.match(NG_OPTIONS_REGEXP);

        if (!match) {
          throw new Error("Expected expression in form of " +
            "'_select_ (as _label_)? for (_key_,)?_value_ in _collection_'" +
            " but got '" + attrs.ngOptions + "'.");
        }

        elem.addClass('dropdown custom-select');

        // Ng-Options break down
        var displayFn = $parse(match[2] || match[1]),
          valueName = match[4] || match[6],
          valueFn = $parse(match[2] ? match[1] : valueName),
          values = match[7],
          valuesFn = $parse(values);

        var options = getOptions(),
          searchModel = match[2] ? (match[2]).replace(new RegExp('^' + valueName + '\\.'), 'search.') : 'search',
          remoteSearch = typeof options.onSearch === 'function',
          timeoutHandle,
          lastSearch = '',
          focusedIndex = -1,
          getInitialSearchModel = function () {
            return match[2] ? {} : '';
          };

        var itemTemplate = elem.html().trim() || '{{' + (match[2] || match[1]) + '}}',

          selectTemplate = '<select class="hide" ng-options="' + attrs.ngOptions + '" ng-model="' + attrs.ngModel + '" ' + (attrs.ngChange ? 'ng-change="' + attrs.ngChange + '"' : '') + '></select>',
          dropdownTemplate =
          '<a class="dropdown-toggle" data-toggle="dropdown" href ng-class="{ disabled: disabled }">' +
            '<span>{{(displayText && displayText.trim()!="")?displayText:"Select"}}</span>' +
            '<b></b>' +
          '</a>' +
          '<div class="dropdown-menu">' +
            '<div stop-propagation="click" class="custom-select-search">' +
              '<input class="' + attrs.selectClass + '" type="text" autocomplete="off" ng-model="' + searchModel + '" />' +
            '</div>' +
            '<ul role="menu">' +
              '<li role="presentation" ng-repeat="' + valueName + ' in ' + values + (remoteSearch ? '' : ' | filter: search') + '">' +
                '<a role="menuitem" tabindex="-1" href ng-click="select(' + valueName + ')">' +
                  itemTemplate +
                '</a>' +
              '</li>' +
              '<li ng-hide="(' + values + (remoteSearch ? '' : ' | filter: search') + ').length" class="empty-result" stop-propagation="click">' +
                '<em class="muted">' +
                  '<span ng-hide="' + searchModel + '">{{emptyListText}}</span>' +
                  '<span class="word-break" ng-show="' + searchModel + '">{{emptySearchResultText | format:' + searchModel + '}}</span>' +
                '</em>' +
              '</li>' +
            '</ul>' +
            '<div class="custom-select-action">' +
              (typeof options.onAdd === "function" ?
              '<button type="button" class="btn btn-primary btn-block add-button" ng-click="add()">{{addText}}</button>' : '') +
            '</div>' +
          '</div>';

        // Clear element contents
        elem.empty();

        // Create hidden select element
        var selectElement = angular.element(selectTemplate);

        // Create dropdown element
        var dropdownElement = angular.element(dropdownTemplate),
          anchorElement = dropdownElement.eq(0).dropdown(),
          inputElement = dropdownElement.eq(1).find(':text'),
          ulElement = dropdownElement.eq(1).find('ul');

        // Create child scope for input and dropdown
        var childScope = scope.$new(true);
        configChildScope();

        // Click event handler to set initial values and focus when the dropdown is shown
        anchorElement.on('click', function (event) {
          if (childScope.disabled) {
            return;
          }
          if (!remoteSearch) {
            childScope.$apply(function () {
              lastSearch = '';
              childScope.search = getInitialSearchModel();
            });
          }
          focusedIndex = -1;
          inputElement.focus();
        });

        // Event handler for key press (when the user types a character while focus is on the anchor element)
        anchorElement.on('keypress', function (event) {
          if (!(event.altKey || event.ctrlKey)) {
            anchorElement.click();
          }
        });

        // Event handler for Esc, Enter, Tab and Down keys on input search
        inputElement.on('keydown', function (event) {
          if (!/(13|27|40|^9$)/.test(event.keyCode)) return;
          event.preventDefault();
          event.stopPropagation();

          switch (event.keyCode) {
            case 27: // Esc
              anchorElement.dropdown('toggle');
              break;
            case 13: // Enter
              selectFromInput();
              break;
            case 40: // Down
              focusFirst();
              break;
            case 9:// Tab
              anchorElement.dropdown('toggle');
              break;
          }
        });

        // Event handler for Up and Down keys on dropdown menu
        ulElement.on('keydown', function (event) {
          if (!/(38|40)/.test(event.keyCode)) return;
          event.preventDefault();
          event.stopPropagation();

          var items = ulElement.find('li > a');

          if (!items.length) return;
          if (event.keyCode == 38) focusedIndex--;                                    // up
          if (event.keyCode == 40 && focusedIndex < items.length - 1) focusedIndex++; // down
          //if (!~focusedIndex) focusedIndex = 0;

          if (focusedIndex >= 0) {
            items.eq(focusedIndex)
              .focus();
          } else {
            focusedIndex = -1;
            inputElement.focus();
          }
        });

        // Compile select element
        $compile(selectElement)(scope);
        elem.append(selectElement);

        // Compile template against child scope
        $compile(dropdownElement)(childScope);
        elem.append(dropdownElement);

        // When model changes outside of the control, update the display text
        controller.$render = function () {
          // Added a timeout to allow for the inner select element
          // to respond to the model change and update the selected option
          $timeout(setDisplayText, 50);
        };

        // Watch for changes in the default display text
        childScope.$watch(getDisplayText, setDisplayText);

        childScope.$watch(function () { return elem.attr('disabled'); }, function (value) {
          childScope.disabled = value;
        });

        // Watch for changes on the original values and update the isolated child scope accordingly
        scope.$watch(values, function (value) {
          childScope[values] = value;
        });

        function setDisplayText() {
          var collection,
            locals = {},
            text = undefined,
            key = selectElement.val();

          if (key && key !== '?') {
            collection = valuesFn(childScope) || [];
            locals[valueName] = collection[key];
            text = displayFn(childScope, locals);
          }

          childScope.displayText = text || options.displayText;
        }

        function getOptions() {
          return angular.extend({}, baseOptions, scope.$eval(attrs.customSelect));
        }

        function getDisplayText() {
          options = getOptions();
          return options.displayText;
        }

        function focusFirst() {
          var opts = ulElement.find('li > a');
          if (opts.length > 0) {
            focusedIndex = 0;
            opts.eq(0).focus();
          }
        }

        // Selects the first element on the list when the user presses Enter inside the search input
        function selectFromInput() {
          var opts = ulElement.find('li > a');
          if (opts.length > 0) {
            var ngRepeatItem = opts.eq(0).scope();
            var item = ngRepeatItem[valueName];
            childScope.$apply(function () {
              childScope.select(item);
            });
            anchorElement.dropdown('toggle');
          }
        }

        function configChildScope() {
          childScope.addText = options.addText;
          childScope.emptySearchResultText = options.emptySearchResultText;
          childScope.emptyListText = options.emptyListText;

          childScope.select = function (item) {
            var locals = {};
            locals[valueName] = item;
            var value = valueFn(childScope, locals);
            //setDisplayText(displayFn(scope, locals));
            childScope.displayText = displayFn(childScope, locals) || options.displayText;
            controller.$setViewValue(value);

            childScope.search = getInitialSearchModel();
            anchorElement.focus();

            typeof options.onSelect === "function" && options.onSelect(item);
          };
          childScope.add = function () {
            options.onAdd(childScope.select);
          };

          if (remoteSearch) {
            inputElement.attr('ng-change', 'onSearch(' + searchModel + ')');
            childScope.onSearch = function (term) {
              if (timeoutHandle) {
                timeoutHandle = $timeout.cancel(timeoutHandle);
              }

              term = (term || '').trim();

              timeoutHandle = $timeout(function () {
                timeoutHandle = $timeout.cancel(timeoutHandle);

                if (term != lastSearch) {
                  options.onSearch((lastSearch = term));
                }
              },
              // If empty string, do not delay
              (term && options.searchDelay) || 0);
            };
          }

          setDisplayText();
        }
      }
    };
  }]);
  ;

