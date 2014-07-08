<table>
    <thead>
        <tr>
        	<th>idrow</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Item Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($cart as $row) :?>
        <tr>
        	<td>{{$row->rowid}}</td>
            <td>
                <p><strong><?php echo $row->name;?></strong></p>
                <p><?php echo ($row->options->has('size') ? $row->options->size : '');?></p>
            </td>
            <td><input type="text" value="<?php echo $row->qty;?>"></td>
            <td>$<?php echo $row->price;?></td>
            <td>$<?php echo $row->subtotal;?></td>
       </tr>

    <?php endforeach;?>
	
    </tbody>
</table>
so item{{$c1}} <br>
	so cot{{$c2}}
	rouID: {{var_dump($s)}}
	{{$s}}
	{{Cart::total();}}
	{{--*/Cart::destroy();/*--}}