@extends('layouts.main')

@section('title', 'About Page')

@section('content')
<div class="row d-flex justify-content-center container">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="font-size-lg font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;&nbsp;About Page</div>
            </div>
            <div class="scroll-area-sm">
                <div id="about-wrapper">
                    <div id="planner-img">
                        <img src="/img/planner.jpeg" alt="Planner" />
                    </div>
                    <div id="about">
                        <h5 id="about-title">
                            My Planner App
                        </h5>
                        <p class="lead">
                            Welcome to your personal planner! Organization and time management
                            are big indicators of success. Using My Planner app, you can organize
                            all your current to-do tasks and view them in one place. Manage your 
                            time well by going to your task list, which displays tasks from most 
                            to least urgent. Upon registering for an account, you must enter your
                            courses (at least one course is required, otherwise you will not be 
                            able to add a task without its corresponding course). When you have
                            completed a task, or if the item is no longer on your to-do list, you
                            can delete it from the task list using the delete icon. You can also
                            bookmark task items that have special importance. Add bookmarks from
                            the task list, and remove bookmarks either from the Bookmarks section 
                            or from the Task List. The Bookmarks section will display all your
                            bookmarked tasks with the timestamp it was bookmarked. 
                        </p>
                        <a class="continue d-flex justify-content-end text-muted" href="{{ route('tasks.index') }}">Continue to Task List <i class="ms-2 fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection