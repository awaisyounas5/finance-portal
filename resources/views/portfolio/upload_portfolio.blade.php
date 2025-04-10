@extends('layouts.master')

@section('content')
<div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                                <div class="mb-3">
                                                    <label>Choose Client</label>
                                                    <select class="form-control" name="quarter" required>
                                                        <option value="" selected disabled>Please Choose Client</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col">
                                                <div class="mb-3">
                                                    <label>Quarter</label>
                                                    <select class="form-control" name="quarter" required>
                                                        <option value="" selected disabled>Please Choose a Quarter</option>
                                                        <option value="Quarter 1">Quarter 1</option>
                                                        <option value="Quarter 2">Quarter 2</option>
                                                        <option value="Quarter 3">Quarter 3</option>
                                                        <option value="Quarter 4">Quarter 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col">
                                                <div class="mb-3">
                                                    <label>Category</label>
                                                    <select class="form-control" name="quarter" required>
                                                        <option value="" selected disabled>Please Choose a Category</option>
                                                        <option value="All Equity">All Equity</option>
                                                        <option value="Primarily Equity">Primarily Equity</option>
                                                        <option value="Balanced Fixed">Balanced Fixed</option>
                                                        <option value="Primarily Fixed">Primarily Fixed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label>Description</label>
                                                    <textarea class="form-control" rows="3" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label>Month n Year</label>
                                                    <input type="month" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                <label for="document">Choose CSV File</label>
                                            <input class="form-control" type="file" id="document" name="document">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-end"><a class="btn btn-success me-3" href="#">Upload Excel</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
@endsection