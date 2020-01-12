

<div class="order">

<h1>Order</h1>

    <div class="fieldset">
       
        <h3>your order from: <?php echo $this->_params['orders'][0]['orderDate'];?> </h3>
        <br>
        <table>
            <tr><td>OrderId: </td><td><?php echo $this->_params['orders'][0]['id'];;?></td></tr>
            <tr><td>orderDate: </td><td><?php echo $this->_params['orders'][0]['orderDate'];?></td></tr>
            <tr><td>shipDate:</td> <td><?php echo $this->_params['orders'][0]['shipDate'];?></td></tr>
            <tr><td>shipPrice: </td><td><?php echo $this->_params['orders'][0]['shipPrice'];?></td></tr>
            <tr><td>payStatus: </td><td><?php echo $this->_params['orders'][0]['payStatus'];?></td></tr>
            <tr><td>payMethod: </td><td><?php echo $this->_params['orders'][0]['payMethod'];?></td></tr>
            <tr><td>payDate: </td><td><?php echo $this->_params['orders'][0]['payDate'];?></td></tr>
            <tr><td>country: </td><td><?php echo  $this->_params['address'][0]['country'];?></td></tr>
            <tr><td>city: </td><td><?php echo $this->_params['address'][0]['city'];?></td></tr>
            <tr><td>zip: </td><td><?php echo $this->_params['address'][0]['zip'];?></td></tr>
            <tr><td>street: </td><td><?php echo $this->_params['address'][0]['street'];;?></td></tr>
            <tr><td> </td><td></td></tr>
            <tr><td> </td><td></td></tr>
        </table>
        <br>
        <hr>
        <br>
        
        <?php foreach($this->_params['orderitem'] as $key => $value):?>
            
            <?php array_push($this->_params['product'],\skwd\models\Product::find('id= '.'\''. $this->_params['orderitem'][$key]['productID']. '\''.' order by id'));?>
            <?php array_push($this->_params['allProducts'],\skwd\models\AllProducts::find('productID= '.'\''. $this->_params['orderitem'][$key]['productID']. '\''.' order by productID')); ?>
            
            <table>
                <tr><td>product id: </td><td><?php echo $this->_params['product'][$key][0]['id'];?></td></tr>
                <tr><td>product name: </td><td><?php echo $this->_params['product'][$key][0]['prodName'];?></td></tr>
                <tr><td>product typ: </td><td><?php echo $this->_params['product'][$key][0]['productType'];?></td></tr>
                
                <?php foreach($this->_params['allProducts'][$key] as $key1 => $value1):?>
                    <tr><td><?php echo $this->_params['allProducts'][$key][$key1]['name'].': ';?> </td><td><?php echo $this->_params['allProducts'][$key][$key1]['value'];?></td></tr>
                    <?php endforeach;?>
                    
                    <tr><td>unit cost: </td><td><?php echo $this->_params['orderitem'][$key]['actualPrice'];?></td></tr>
                    <tr><td>quantity: </td><td><?php echo $this->_params['orderitem'][$key]['qty'];?></td></tr>
                    <tr><td>go to product: </td>
                    <td><a href="?c=products&a=theProduct&i=<?php echo $this->_params['product'][$key][0]['id'];?>">here</a></td></tr>
                </table>
                <br><br>
                
                <?php endforeach;?>
                
            </div>
            
        </div>
            