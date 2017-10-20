<?php
    $new=get_records("tbl_item","status=1 AND idshop='{$idshop}' AND special","id DESC", $startRow.",".$pageSize, " ");
    $i=0;
    while($row_new=mysql_fetch_assoc($new)){
        if($i % 4 == 0) {
?>  
<div class="row">
<?php
        }
?>  
    <div class="col-3">
                                    <div>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <?php
                                                    if($row_new['image']=="") 
                                                        $hinh="skin/temp".$url."/imgs/noimage.png";
                                                    else 
                                                        $hinh=$row_new['image'];
                                                        
                                                    if(strtoupper(substr($hinh, -3, 3)) != 'GIF'){
                                                        // $hinh = 'http://res.cloudinary.com/tint/image/fetch/w_164,h_123,c_thumb/http%3A%2F%2Fthegioidienthoaico.com/' . $hinh;
                                                         $hinh = 'http://res.cloudinary.com/tint/image/fetch/c_thumb/http%3A%2F%2Fthegioidienthoaico.com/' . $hinh;
                                                    }
                                                    ?>
                                                    <a href="chi-tiet/<?php echo $row_new['subject']?>.html" title="<?php echo $row_new['name']?>" <?php if($row_shop['tooltip']==0){?>  onmouseover="AJAXShowToolTip('show-tip/<?php echo $row_new['id'];?>'); return false;" onmouseout="AJAXHideTooltip();" <?php }?>>
                                                    <img  class="img-responsive" src="<?=$hinh ?>" alt="<?php echo $row_new['name']?>"/>
                                                    
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                                       
                                    <h2 class="title_prod_news center">
                                      <a href="chi-tiet/<?php echo $row_new['subject']?>.html" title="<?php echo $row_new['name']?>" <?php if($row_shop['tooltip']==0){?> onmouseover="AJAXShowToolTip('show-tip/<?php echo $row_new['id'];?>'); return false;" onmouseout="AJAXHideTooltip();" <?php }?>><?php echo $row_new['name']?></a>
                                    </h2>
                                    <h4 class="price_prod_mau_gh center" title="<?php echo $row_new['name'];?>">
                                        <?php
                                            if(trim($row_new['price'])=='' and trim($row_new['pricekm'])=='')
                                            {
                                                echo '<span style="color:#ff0000">Giá: Liên Hệ</span><br/>';  
                                            }
                                            else
                                            {
                                                if(trim($row_new['price'])!='' && trim($row_new['pricekm'])!='')
                                                {
                                                    if(preg_match ("/^([0-9]+)$/", $row_new['price']))
                                                    { 
                                                        echo '<span style="text-decoration: line-through;">Giá: '.number_format($row_new['price'],0)." ".$row_shop['tiente'].'</span></br>';
                                                    }
                                                    else 
                                                        echo '<span style="text-decoration: line-through;">Giá: '.$row_new['price'].'</span></br>';
                                                    if(preg_match ("/^([0-9]+)$/", $row_new['pricekm']))
                                                    { 
                                                        echo '<span style="color:#11AB00">Giá khuyến mãi: '.number_format($row_new['pricekm'],0)." ".$row_shop['tiente'].'</span></br>';
                                                    }
                                                    else 
                                                        echo '<span style="color:#11AB00">Giá khuyến mãi: '.$row_new['pricekm'].'</span></br>'; 
                                                }
                                                else
                                                {
                                                    if(preg_match ("/^([0-9]+)$/", $row_new['price']))
                                                    { 
                                                        echo '<span style="color:#ff0000">Giá: '.number_format($row_new['price'],0)." ".$row_shop['tiente'].'</span></br>';
                                                    }
                                                    else 
                                                        echo '<span style="color:#ff0000">Giá: '.$row_new['price'].'</span></br>';
                                                }
                                            }
                                        ?>
                                    </h4> 
                    </div>
        if($i % 4 == 3) {
?>  
</div>
<?php
        }
?>  
<?php 
        $i++;
    }
    $i--;
    if ($i % 4 != 3) {
?>  
</div>
<?php
    }
?>
