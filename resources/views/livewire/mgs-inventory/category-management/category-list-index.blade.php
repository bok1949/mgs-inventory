<div>
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
                            <th scope="col">Category Name</th>
                            <th scope="col">Note</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->note }}</td>
                            <td>
                                {{-- Edit --}}
                                <button 
                                    class="btn"
                                >
                                    <a href="{{ route('update-category-index', $category->id) }}">
                                        <i class="bi bi-pen"></i>
                                    </a>
                            </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
