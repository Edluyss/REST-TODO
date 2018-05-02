<!doctype html>
<html lang="en">
<head>
    <title>Activity</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/angular-ui-notification.min.css'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body ng-app="Myapp">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Creative Team</a>
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Activity</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-3">TO-DO</h1>
            <p class="lead">A simple to-do list management system</p>
        </div>
    </div>

    <div class="container my-5" ng-controller="itemController">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Task</h4>
                            <p class="card-text">Add a new task to the list</p>

                            <hr>

                            <form action="#" name="Myform_add">
                                <div class="form-group">
                                    <label for="#">
                                        <strong>Name</strong>
                                    </label>
                                    <input class="form-control" value="" placeholder="Task Name" type="text" ng-model="add.task_name" required name="todoinput">
                                </div>

                                <div class="form-group">
                                    <label for="#">
                                        <strong>Description</strong>
                                    </label>
                                    <textarea  cols="30" rows="5" class="form-control" placeholder="Task Description here" type=" text" ng-model="add.task_description" required name="todoinput_textarea"></textarea>
                                </div>

                                <div class="form-group clearfix">
                                    <button class="btn btn-danger px-5 float-right" type="button" ng-show="Myform_add.add.$invalid ||
                                    Myform_add.todoinput_textarea.$invalid" disabled>Add Task</button>
                                </div>
                                <div class="form-group clearfix">
                                    <button class="btn btn-primary px-5 float-right" ng-click="save()" type="button" ng-show="Myform_add.todoinput.$valid && Myform_add.todoinput_textarea.$valid">Add Task</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Task</h4>
                            <p class="card-text">Update an unfinished task to the list</p>

                            <hr>

                            <form action="#" name="Myform_update">
                                <div class="form-group">
                                    <label for="#">
                                        <strong>Task ID</strong>
                                    </label>
                                    <input type="text" ng-pattern="/^[0-9]/"  class="form-control" placeholder="Type task id here"  ng-model="todoupdate.task_id" name="todoupdate_id" required>
                                </div>

                                <div class="form-group">
                                    <label for="#">
                                        <strong>Name</strong>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Type task name here" ng-model="todoupdate.task_name" name="todoupdate_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="#">
                                        <strong>Description</strong>
                                    </label>
                                    <textarea cols="30" rows="5" class="form-control" placeholder="Type task description here" ng-model="todoupdate.task_description"
                                        name="todoupdate_textarea"
                                    required></textarea>
                                </div>

                                <div class="form-group clearfix">
                                    <button class="btn btn-danger px-5 float-right" type="button" ng-show="Myform_update.todoupdate_id.$invalid || Myform_update.todoupdate_name.$invalid" disabled>Update Task</button>
                                </div>
                                <div class="form-group clearfix">
                                    <button class="btn btn-primary px-5 float-right"  ng-click="update()" type="button" ng-show="Myform_update.todoupdate_id.$valid && Myform_update.todoupdate_name.$valid">Update Task</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5" ng-controller="itemController">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">My Tasks</h4>
                    <p class="card-text">A list of the tasks that you have created</p>

                    <hr class="mb-3">

                    <form action="#" class="mb-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Type task information here">
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Task ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Date Completed</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr ng-repeat="i in item">
                                <td scope="row"> {{i.task_id}} </td>
                                <td>{{i.task_name}}</td>
                                <td>
                                    <span ng-show="i.status_name=='On-going'" class="badge badge-success">{{i.status_name}}</span>
                                    <span ng-show="i.status_name=='Completed'" class="badge badge-warning">{{i.status_name}}</span>
                                </td>
                                <td>{{i.task_completed}}</td>
                                <td>
                                    <button ng-click="completed(i.task_id)" class="btn btn-primary btn-sm" >Complete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>    
                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="<?php echo base_url('assets/app.js'); ?>"></script>
    <script src="<?php echo base_url('assets/angular-ui-notification.js'); ?>"></script>
</body>
</html>