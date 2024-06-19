<div>
    <div>
        Id:
        {{$id}}
    </div>
    
    <div>
        Name:
        {{$categoryName}}
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xxl-12">
            {{-- create filters and search categories here --}}
            {{-- create clear filter and serach box also --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="data-table-wrapper">
                <table class="table">
                    <thead> 
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Note</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->note }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 justify-content-betweeen">
                                    <button wire:click="showId({{$category->id}})"><i class="bi bi-trash text-danger"></i></button>
                                    <i class="bi bi-pen"></i>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
