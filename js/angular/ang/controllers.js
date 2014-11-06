'use strict';

/* Controllers */

angular.module('myApp.controllers', [])
.controller('mainController', function($rootScope, $scope, $window, $location,$http, $anchorScroll) {
  $scope.ledgers = [];
  $scope.groups = [];
  $scope.selectedLedger = {};
  $scope.selectedGroup = {};
  $scope.newLedger = {};
  $scope.company={};
  $scope.states = [];
  $scope.districts = [];
  $scope.cities = [];
  $scope.new_city = "";
  $http.get("../data/states")
  .success(function(states){
    $scope.states = states;
  })
  .error(function(error){
    console.log(error);
  });

  $scope.getCompanyInfo= function(){
    $http.get("../userinfo/getCompany")
    .success(function(response){
      if(response.success)
        $scope.company = response.company;
      else
        $window.alert(response.message);    
    })
    .error(function(error){
      console.log(error);
    });
  }
  $http.get("../data/districts")
  .success(function(districts){
    $scope.districts = districts;
  })
  .error(function(error){
    console.log(error);
  });

  $http.get("../data/cities")
  .success(function(cities){
    $scope.cities = cities;
  })
  .error(function(error){
    //console.log(error);
  });

  

   function closeModal(){
    $(".close").click();
  }
  $scope.resetSelectedLedger = function(){
    $scope.selectedLedger = {};
  };

  $scope.getDistricts = function(state){
    if(!state){
      return [];
    }
    var districts = $scope.districts.filter(
      function(district){
        return (district.state_id==state.id);
      }
    );
    return districts;
  };

  $scope.getCities = function(district){
    if(!district){
      return [];
    }
    var cities = $scope.cities.filter(
      function(city){
        return (city.district_id == district.id);
      }
    );
    return cities;
  };

  $scope.resetSelectedGroup = function(){
    $scope.selectedGroup = {};
  }

  $scope.createLedger = function(){
    $http.post("../ledger/create", $scope.selectedLedger)
    .success(function(response){
      if(response){
        $window.alert("Ledger Created Successfully");
      }
    })
    .error(function(error){
      alert(error);
    })
  };
  $scope.createGroup = function(){
    $http.post("../group/create", $scope.selectedGroup)
    .success(function(response){
      if(response){
        //$window.alert("Group Created Successfully");
        $scope.selectedGroup.name = "";
        $scope.selectedGroup.group = "";
        closeModal();
        $scope.getGroups();
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.getLedgers = function(){
    $http.get("../ledger/get")
    .success(function(response){
      $scope.ledgers = response;
    })
    .error(function(error){
      alert(error);
    })
  };
  $scope.getGroups = function(){
    $http.get("../group/get")
    .success(function(response){
      $scope.groups = response;
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.getGroups = function(){
    $http.get("../group/get")
    .success(function(response){
      $scope.groups = response;
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.setSelectedLedger = function(ledger){
    $scope.selectedLedger = angular.copy(ledger); 
    var temp = $scope.states.filter(
      function(state){
        return ($scope.selectedLedger.state==state.name);
      }
    );  
    if(temp.length>0)
      $scope.selectedLedger.state = temp[0];
    
    temp = $scope.districts.filter(
      function(district){
        return ($scope.selectedLedger.state.id == district.state_id && $scope.selectedLedger.district==district.name);
      }
    );  
    if(temp.length>0)
      $scope.selectedLedger.district = temp[0];

    temp = $scope.cities.filter(
      function(city){
        return ($scope.selectedLedger.district.id == city.district_id && $scope.selectedLedger.state.id == city.state_id && $scope.selectedLedger.city==city.name);
      }
    );  
    if(temp.length>0)
      $scope.selectedLedger.city = temp[0];

  };

  $scope.setSelectedGroup = function(group, index){
    $scope.selectedGroup = angular.copy(group); 
    $scope.selectedGroup.index = index;   
  };
  
  $scope.updateLedger = function(){  
    console.log($scope.new_city);  
    if($scope.new_city && $scope.new_city!=""){

      

      $scope.selectedLedger.city.id = 0;
      $scope.selectedLedger.city.name = $scope.new_city;
      $scope.selectedLedger.city.district_id = $scope.selectedLedger.district.id;
      $scope.selectedLedger.city.state_id = $scope.selectedLedger.state.id;
    }
    

    $http.post("../ledger/update", $scope.selectedLedger)
    .success(function(response){
      if(response){
        $window.alert("Ledger Updated Successfully");
      }
    })
    .error(function(error){
      alert(error);
    })
  };
  $scope.updateCompany = function(){
    $http.post("../userinfo/updateCompany", $scope.company)
    .success(function(response){
      if(response){
        $window.alert("Company Profile Updated Successfully");
        $location.path('/home');
      }
    })
    .error(function(error){
      $window.alert(error);
    })
  };

  $scope.updateGroup = function(){
    $http.post("../group/update", $scope.selectedGroup)
    .success(function(response){
      if(response){
        //$window.alert("Group Updated Successfully");
        $scope.groups[$scope.selectedGroup.index].name = $scope.selectedGroup.name;
        $scope.groups[$scope.selectedGroup.index].group = $scope.selectedGroup.group;
        closeModal();
        $scope.selectedGroup = "";
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.deleteLedger = function(ledger, index){
    var retVal = confirm("Do you want to delete ?");
    if (retVal == true) {
      $http.post("../ledger/delete", {id : ledger.s_no})
      .success(function(data){
        $scope.ledgers.splice(index, 1);
      }).
      error(function(err){

      });
    }
  }

  $scope.deleteGroup = function(group, index){
    var retVal = confirm("Do you want to delete ?");
    if (retVal == true) {
      $http.post("../group/delete", {id : group.id})
      .success(function(data){
        $scope.groups.splice(index, 1);
      }).
      error(function(err){

      });
    }
  }
  
});