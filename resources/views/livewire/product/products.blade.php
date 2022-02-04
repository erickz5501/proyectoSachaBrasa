<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="cart-title">
                    <b> {{$componentName}} | {{$pagetitle}} </b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <button href="javascript:void(0);" class="btn px-3 py-2 text-white" data-toggle="modal" data-target="#theModal" type="button" style=" background:#e05f1a" ">
                            <i class="fas fa-plus-circle"></i>
                            <span>Agregar</span>
                        </button>
                    </li>
                </ul>
            </div>
            
            @include('common.searchbox')

            <div class="widget-content">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #e05f1a ">
                            <tr>
                                <th class="table-th text-white">Nombre</th>
                                <th class="table-th text-white">Descripción</th>
                                <th class="table-th text-white">Precio</th>
                                <th class="table-th text-white">Stock</th>
                                <th class="table-th text-white">Categoria</th>
                                <th class="table-th text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( count($products) > 0 )
                                @foreach($products as $product)
                                    <tr>
                                        <td><h6> {{$product->name}}</h6></td>
                                        <td><h6> {{$product->description}}</h6></td>
                                        <td><h6>S/. {{$product->price}}</h6></td>
                                        <td><h6> {{$product->stock}} </h6></td>
                                        <td><h6> {{$product->category->name}} </h6></td>
                                        <td class="text-left">
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td class="text-left" colspan="6"><span class="d-block p-2 bg-warning text-white">SIN REGISTROS...</span></td>
                            </tr>
                            @endif
                            
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>

            </div>
        </div>
    </div>
    @include('livewire.product.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){

    });

    $("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
    });
    
    function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.
    
    // get input value
    var input_val = input.val();
    
    // don't validate empty input
    if (input_val === "") { return; }
    
    // original length
    var original_len = input_val.length;

    // initial caret position 
    var caret_pos = input.prop("selectionStart");
        
    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);
        
        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
        right_side += "00";
        }
        
        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = "$" + left_side + "." + right_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = "$" + input_val;
        
        // final formatting
        if (blur === "blur") {
        input_val += ".00";
        }
    }
    
    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
    }

</script>