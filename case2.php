<?php

/**
 * Cart
 */
class Cart 
{
    private $cart = [];

    /**
     * tambahProduk is a method for add item into cart
     *
     * @param string $product_name
     * @param int $quantity
     * @return void
     */
    public function tambahProduk($product_name, int $quantity = 1, $debug = false) 
    {
        $cart = $this->cart;

        $id = strtolower(str_replace(' ', '', $product_name));

        if (isset($cart[$id])) {
            $qty_added = ($cart[$id]['qty'] + $quantity);
        } else {
            $cart[$id]['name'] = $product_name;
            $cart[$id]['qty'] = $quantity;
        }
        
        if (isset($qty_added)) {
            $cart[$id]['qty'] = $qty_added;
        }

        if ($debug) {
            echo '<pre>';
            var_dump($cart);
            echo '</pre>';
        }

        $this->cart = $cart;
    }

    /**
     * hapusProduk is a method for delete item
     *
     * @param string $product_name
     * @param int $quantity
     * @return void
     */
    public function hapusProduk($product_name, int $quantity = 1)
    {
        $id = strtolower(str_replace(' ', '', $product_name));

        try {
            if (isset($this->cart[$id])) {
                $this->cart[$id]['qty'] = $this->cart[$id]['qty'] - $quantity;
            } else {
                throw new Exception($product_name);
            }
        } catch (Exception $e) {
            echo '<p style="color:red">Warning: Tidak ada produk dengan nama ' . $e->getMessage() . '</p><br />';
        }
    }

    /**
     * tampilkanCart is method for display list of items on the cart
     *
     * @return string
     */
    public function tampilkanCart()
    {
        if ($this->cart) {
            echo '<ul>';
            foreach ($this->cart as $item) {
                echo '<li>' . $item['name'] . ' (' . $item['qty'] . ')</li>';
            }
            echo '</ul>';
        } else {
            echo 'Cart is empty';
        }
    }
}

$cart = New Cart;

$cart->tambahProduk("Topi Putih", 2);

$cart->tambahProduk("Kemeja Hitam", 3);

$cart->tambahProduk("Sepatu Merah", 1);
$cart->tambahProduk("Sepatu Merah", 4);
$cart->tambahProduk("Sepatu Merah", 2);

$cart->hapusProduk("Kemeja Hitam");

$cart->hapusProduk("Baju Hijau");

$cart->tampilkanCart();