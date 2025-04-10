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
                                                    <label>Document Name</label>
                                                    <input type="text" class="form-control" placeholder="Document Name" name="document_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col">
                                                <div class="mb-3">
                                                    <label>Category</label>
                                                    <select class="form-control" name="category" required>
                                                        <option value="" selected disabled>Please Choose a Category</option>
                                                        <option value="Fund Holdings">Fund Holdings</option>
                                                        <option value="Large Cap Growth">Large Cap Growth</option>
                                                        <option value="Large Cap Value">Large Cap Value</option>
                                                        <option value="Large Cap Blend">Large Cap Blend</option>
                                                        <option value="Mid-Cap Growth">Mid-Cap Growth</option>
                                                        <option value="Small-Cap">Small-Cap</option>
                                                        <option value="Foreign Large Cap Blend">Foreign Large Cap Blend</option>
                                                        <option value="Emerging Markets">Emerging Markets</option>
                                                        <option value="Fixed Income - Taxable - Core">Core</option>
                                                        <option value="Fixed Income - Taxable - High Yield">Fixed Income - Taxable - High Yield</option>
                                                        <option value="Fixed Income - Taxable - Multi Sector">Fixed Income - Taxable - Multi Sector</option>
                                                        <option value="Fixed Income - Munis - Core">Fixed Income - Munis - Core</option>
                                                        <option value="Fixed Income - Munis - High Yield">Fixed Income - Munis - High Yield</option>
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
                                                <label for="document">Choose PDF</label>
                                            <input class="form-control" type="file" id="document" name="document">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-end"><a class="btn btn-success me-3" href="#">Upload PDF</a></div>
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