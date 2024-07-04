<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop='static' 
        data-bs-keyboard="false" 
        tabindex="-1"
        id="modalAddStockToStockLevel" 
        role="dialog"
    >
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white">Add product</h5>
                    <button type="button" data-bs-dismiss="modal" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <div class="row">
                        <label for="" class="col-md-2 col-form-label text-end">Product:</label>
                        <div class="col-md-7">
                            <input 
                                type="text" 
                                class="form-select"
                                placeholder="Search product..."
                                wire:model="searchProduct"
                                wire:click="toggleItem"
                            >

                            @if ($toggleToShowItem === true)
                                <ul class="list-group">
                                    @foreach ($products as $product)
                                    <li class="list-group-item">
                                        <a 
                                            class="" 
                                            href="#" 
                                            wire:click="selectProduct({{$product->productId}}, '{{$product->product_name}}', '{{$product->product_code}}')"
                                        >
                                            {{$product->product_code ?? 'no product code'}}
                                            : {{$product->product_name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                            
                        </div>
                    </div>

                    <div class="row mt-3">
                        @dump($productLevelItems)
                        dataItem = @dump($dataItem)
                        dataIndexes = @dump($dataIndexes)
                        availableStockValue = @dump($availableStockValue)
                        <div class="col-md-12">
                            <h5 class="text-center">Product level to create</h5>
                            <table class="table table-hover table-bordered create-stock-level-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Supplier</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Available</th>
                                        <th scope="col">Defective</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productLevelItems as $key=>$productLevelItem)
                                        <tr>
                                            <th scope="row">
                                                {{$productLevelItem['product_code'] ?? 'no code'}}:
                                                {{$productLevelItem['product_name']}}
                                            </th>
                                            <td>
                                                @if (count($suppliers) > 0)
                                                    <select class="form-select" wire:model="selectedSupplierId">
                                                        <option value="">Select supplier...</option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{$supplier->supplierId}}">{{$supplier->supplier_name}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p class="text-warning">No suppliers available!</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if (count($brands) > 0)
                                                    <select class="form-select" wire:model="selectedBrandId">
                                                        <option value="">Select brand...</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{$brand->brandId}}">{{$brand->brand_name}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p class="text-warning">No brands available!</p>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="number" wire:model="dataItem[{{$key}}]" class="form-control" placeholder="Available stock...">
                                            </td>
                                            <td>
                                                <input type="number" wire:model="defectiveStockValue" class="form-control" placeholder="Defective stock...">
                                            </td>
                                            <td>
                                                <select class="form-select" wire:model="selectedUnitMeasurement">
                                                    <option value="">Unit of measurement...</option>
                                                    <option value="pc">Piece</option>
                                                    <option value="gal">Gallon</option>
                                                    <option value="ltr">Liter</option>
                                                    <option value="met">Meter</option>
                                                    <option value="kg">Kilogram</option>
                                                    <option value="ft">Foot</option>
                                                    <option value="drm">Drum</option>
                                                    <option value="yd">Yard</option>
                                                    <option value="n/a">Not applicable</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" placeholder="Price in peso...">
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <i class="bi bi-plus-circle"></i>
                                                </a> |
                                                <a href="#">
                                                    <i class="bi bi-x-circle"></i>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="8">
                                                <div class="alert alert-warning text-center" role="alert">
                                                    No available data yet, add products to the stock level list.
                                                </div>
                                            </th>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</a>
                    <a href="#" class="btn btn-primary" wire:click="saveChanges">
                        Save
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
