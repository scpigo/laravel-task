@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{ html()->label('Выберите товар', 'good_id') }}
    {{ html()->select('good_id', $goodsList)->class('goods') }}
</div>
<div class="form-group">
    {{ html()->label('Количество', 'good_quantity') }}
    {{ html()->number('good_quantity', '1', '1', '99', '1')->class('quantity') }}
</div>
<div class="form-group">
    {{ html()->label('Ваше ФИО', 'buyer_fio') }}
    {{ html()->text('buyer_fio') }}
</div>
<div class="form-group">
    {{ html()->label('Комментарий к заказу', 'comment') }}
    {{ html()->textarea('comment') }}
</div>
<div class="form-group">
    {{ html()->label('Итоговая цена', 'total_price') }}
    {{ html()->text('total_price', 0)->class('price')->isReadonly() }}
</div>
<div class="form-group">
    {{ html()->submit('Сделать заказ') }}
</div>

<script>
    $(document).ready(function() {
        updatePrice($('.goods').val(), $('.quantity').val());
    });

    $('.goods').on('change', function (e) {
        updatePrice($('.goods').val(), $('.quantity').val());
    });

    $('.quantity').on('change', function (e) {
        updatePrice($('.goods').val(), $('.quantity').val());
    });

    function updatePrice (good_id, quantity) {
        $.ajax({
            url: '/getPrice',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'good_id': good_id,
                'quantity': quantity
            },
            enctype: 'multipart/form-data',
            type: 'POST',
            success: function (data) {
                $('.price').val(data.price);
            }
        });
    }
</script>
