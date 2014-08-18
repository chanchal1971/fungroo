angular.module( 'socialMediaPlugin.custDir', [
'ui.router',
'ngProgress',
'mouthShutFeeds',
'fourSquarFeeds',
'facebookFeeds',
'twitterFeeds',
'getItFeeds'
])
.filter('userFilter',function userFilter(){
  var facebookFilter = function facebookFilter(feed,user){
    var filteredFeeds = [];
    angular.forEach(feed,function filter(item){
      var bLikes =false, bTo=false, bFrom=false;
      if(item.likes){
        angular.forEach(item.likes.data,function(like){
          bLikes|=angular.equals(like.id,user.id);
        });
      }
      if(item.from){
        bFrom = angular.equals(item.from.id,user.id);
      }
      if(item.to){
        bTo = angular.equals(item.to.id,user.id);
      }

      if(bLikes||bTo||bFrom){
        filteredFeeds.push(item);
      }
    });
    return filteredFeeds;
  };

  var foursquarFilter = function foursquarFilter(feed,user){
    var filteredFeeds = [];
    angular.forEach(feed, function filter(item){
      var bLikes=false,bUser = false;
      if(item.likes && item.likes.groups){
        angular.forEach(item.likes.groups, function(group){
          angular.forEach(group.items, function(like){
            bLikes|=angular.equals(like.id, user.id);
          });
        });
      }
      if(item.user){
        bUser = angular.equals(item.user.id,user.id);
      }
      if(bLikes||bUser){
        filteredFeeds.push(item);
      }
    });
    return filteredFeeds;
  };

  var mouthshutFilter = function mouthshutFilter(feed,user){
    var filteredFeeds = [];
    angular.forEach(feed, function(item){
      var bUser = false;
      if(item.users){
        bUser = angular.equals(user.text,item.users.text);
      }
      if(bUser){
        filteredFeeds.push(item);
      }
    });
    return filteredFeeds;
  };

  var getitFilter = function getitFilter(feed,user){
    var filteredFeeds = [];
    angular.forEach(feed, function(item){
      var bUser = false;
      console.log(item);
      if(item.users){
        bUser = angular.equals(user.name,item.users);
      }
      if(bUser){
        filteredFeeds.push(item);
      }
    });
    console.log(filteredFeeds);
    return filteredFeeds;
  };

  return function filterFunct(feed,user,cat){
    console.log(cat);
    switch(cat){
    case 'facebook':
      return facebookFilter(feed,user);
    case 'foursquar':
      return foursquarFilter(feed,user);
    case 'mouthshut':
      return mouthshutFilter(feed,user);
    case 'getit' :
      return getitFilter(feed,user);
    default : return [];
    }
  };

})
.config(['$stateProvider',function config($stateProvider ) {
  $stateProvider.state( 'custDir', {
    url: '/custDir',
    views: {
      "main": {
        controller: 'custDirCtrl',
        templateUrl: 'custDir/custDir.tpl.html'
      }
    },
    data:{ pageTitle: 'Home' }
  }).state('custDir.details',{
    params: ['user','catagory'],
    views: {
      "custDetails": {
        controller: 'custDetailsCtrl',
        templateUrl: 'custDir/custDetails.tpl.html'
      }
    }
  });
}])
.controller( 'custDirCtrl',[
'$scope',
'$state',
'ngProgress',
'facebookService',
'foursquarService',
'mouthshutService',
'getitService',
function custDirCtrl($scope,$state,ngProgress,facebookService,foursquarService,mouthshut,getitService){
  ngProgress.start();
  $scope.foursquarUsers=[];
  $scope.facebookUsers=[];
  $scope.mouthshutUsers=[];
  $scope.getitUsers =[];

  foursquarService.getUsers('cloud nine', function(data){
    $scope.foursquarUsers=$.merge($scope.foursquarUsers,data);
  });

  mouthshut.getUsers('cloudnine', function(data){
    $scope.mouthshutUsers = data;
    ngProgress.set(ngProgress.status()+10);
  });

  getitService.getUsers('cloudnine', function(data){
    $scope.getitUsers= data;
    ngProgress.set(ngProgress.status()+10);
  });

  $scope.$watch(function() {
    return facebookService.isReady(); // This is for convenience, to notify if Facebook is loaded and ready to go.
  }, function(newVal) {
    if(newVal){
      facebookService.helloFb();
      facebookService.searchFeeds('Cloud Nine India', function(data){
        angular.forEach(data.data,function getLikes(post){
          if(post.likes){
            $scope.facebookUsers=$scope.facebookUsers.concat(post.likes.data);
          }
          if(post.from){
            $scope.facebookUsers=$scope.facebookUsers.concat([post.from]);
          }

        });
        ngProgress.set(ngProgress.status()+10);
      });
    }
  });

  $scope.showUserData =  function showUserData(user,catagory){
    if(!(user||catagory)){
      return;
    }
    $state.go('custDir.details',{user:angular.toJson(user),catagory:catagory});
  };
}])
.controller('custDetailsCtrl',[
'$scope',
'$state',
'$stateParams',
'ngProgress',
'facebookService',
'foursquarService',
'mouthshutService',
'getitService',
function custDetailsCtrl($scope,$state,$stateParams,ngProgress,facebookService,foursquar,mouthshut,getitService){
  ngProgress.start();
  $scope.currentCat = function currentCat(){
    return $stateParams.catagory;
  };

  $scope.currentUser = function currentUser(){
    return angular.fromJson($stateParams.user);
  };

  foursquar.getReviews('cloud nine', function(data){
    if(!$scope.foursquarFeeds){
      $scope.foursquarFeeds = data;
    }
    else{
      $scope.foursquarFeeds.push.apply(data);
    }
    ngProgress.set(ngProgress.status()+10);
  });

  getitService.searchFeeds('cloudnine', function(data){
    $scope.getitFeeds = data;
    console.log("getit array");
    console.log($scope.getitFeeds);
    ngProgress.set(ngProgress.status()+10);
  });

  mouthshut.searchFeeds('cloudnine', function(data){
    $scope.mouthShutFeeds = data;
    ngProgress.set(ngProgress.status()+10);
  });

  $scope.$watch(function() {
    return facebookService.isReady(); // This is for convenience, to notify if Facebook is loaded and ready to go.
  }, function(newVal) {
    if(newVal){
      facebookService.helloFb();
      facebookService.searchFeeds('Cloud Nine India', function(data){
        $scope.fbFeeds = data;
        ngProgress.set(ngProgress.status()+10);
      });
    }
  });

  $scope.$watch(function() {
      return ($scope.foursquarFeeds&&$scope.fbFeeds);
    }, function(newVal) {
      if(newVal){
        ngProgress.complete();
      }
    });

}])
.directive('windowHeight',['$window',function($window){
  console.log("changing height");
  var link = function link(scope, element, attrs){
    var w = angular.element($window);
    scope.$watch( w.height(),
      function (newValue, oldValue) {
        console.log(newValue);
        element.height(newValue + 'px');
      });
  };

  return function (scope, element, attrs) {
      element.height($(window).height());
  };
}])
;
