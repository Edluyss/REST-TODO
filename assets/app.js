var app =angular.module('Myapp',['ui-notification'])
app.controller('itemController', function($scope,Notification,$http,$interval){
    $scope.sortableOptions = {
    disabled: true};
	$scope.item = {}
	$scope.todoupdate={}
	$scope.add = {}
	$scope.get = function(){
        $http.get('http://localhost/REST-TODO/item/item')
        .then(function(success){
            
        
            console.log(success.data.status)
            $scope.item =success.data.message
        },function(error){
            console.log(error.data)
        })
    }   
    $interval(function(){$scope.get()},3000)

	$scope.save = function(){
        $http.post('http://localhost/REST-TODO/item/item',$scope.add)
            .then(function(success){
                Notification.success({message: 'Task Succesfully added'});
            $scope.add={};
            
        },function(error){
            Notification.error({message: "ERROR task not added.", title: error.data.status});
        })
    }
   $scope.completed=function(id){
   	$http.put('http://localhost/REST-TODO/item/item',id)
   		.then(function(success){
   			Notification.info({message: 'Task Completed'});
   		})
   } 

    
    $scope.update = function(){ 
        $http.post('http://localhost/REST-TODO/item/update',$scope.todoupdate)
        .then(function(success){
            Notification.success({message:"You have successfully updated the task.", title: success.data.status});
        $scope.todoupdate={};
            
        },function(error){
            Notification.error({message: "You cannot update a completed task.", title: error.data.status});
        }
        )
    }

})