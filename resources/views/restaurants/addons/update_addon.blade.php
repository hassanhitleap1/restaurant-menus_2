@extends("restaurants.layouts.restaurantslayout")

@section("restaurantcontant")


    <div class="container-fluid mt--6">
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Update Addon Category</h3>
                @if(session()->has("MSG"))
                    <div class="alert alert-{{session()->get("TYPE")}}">
                        <strong> <a>{{session()->get("MSG")}}</a></strong>
                    </div>
                @endif
                @if($errors->any()) @include('admin.admin_layout.form_error') @endif
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form  method="post" action="{{route('store_admin.update_addon',['id'=>$addon->id])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PATCH')
                <!-- Form groups used in grid -->
                    <div class="row">


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols2Input">Addon Category Name</label>
                                <input type="text" name="addon_name" value="{{$addon->addon_name}}" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols2Input" style="color: red;">Select Category Type</label>
                                <select name="addon_category_id" class="form-control" required>
                                    @foreach( $addons_category as $category)
                                        <option value="{{$category->id}}" {{$category->id == $addon->addon_category_id ? "selected":null}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols2Input">Addon Price</label>
                                <input type="number" name="price" value="{{$addon->price}}" class="form-control" required>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>

                </form>
            </div>



        </div>




@endsection
