<?php

namespace App;

class Cart
{
    public $products = null;
    public $totalQuanty = 0;
    public $totalDiscount = 0;
    public $totalPrice = 0;
    public $Total = 0;
    public $SubTotal = 0;
    public $DiscountMember = 0;
    public $PhoneMember = "0000000000";

    public function  __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalQuanty = $cart->totalQuanty;
            $this->totalDiscount = $cart->totalDiscount;
            $this->totalPrice = $cart->totalPrice;
            $this->Total = $cart->Total;
            $this->SubTotal = $cart->SubTotal;
            $this->DiscountMember = $cart->DiscountMember;
            $this->PhoneMember = $cart->PhoneMember;
        }
    }
    public function addCart($id, $SP, $CTSP, $KM)
    {
        $newProduct = [
            'SoLuong' => 0,
            'SanPham' => $SP,
            'CTSP' => $CTSP,
            'GiamGia' => 0,
            'TongGia' => $CTSP->giasanpham,
        ]; //tạo sản phẩm mới nếu sản phẩm chư tồn tại.
        if ($this->products) { //kiểm tra xem products có khác null không
            if (array_key_exists($id, $this->products)) {  //kiểm tra xem sản phẩm đã có trong giỏ hàng chưa.
                $newProduct = $this->products[$id]; //gán lại giá trị củ cho sản phẩm.
            }
        }
        if ($newProduct['SoLuong'] < $newProduct['CTSP']->soluong) {
            $newProduct['SoLuong']++;
            $newProduct['GiamGia'] = $CTSP->giasanpham * ($KM / 100);
            $newProduct['TongGia'] = $newProduct['SoLuong'] *  $CTSP->giasanpham;
            $this->products[$id] = $newProduct;
            $this->totalDiscount += $CTSP->giasanpham * ($KM / 100);
            $this->totalPrice += $CTSP->giasanpham;
            $this->totalQuanty++;
            $this->SubTotal = $this->totalPrice - $this->totalDiscount;
            $this->Total = $this->SubTotal - $this->DiscountMember;
        }
    }

    public function deleteItemCart($id)
    {
        $this->totalQuanty -= $this->products[$id]["SoLuong"];
        $this->totalPrice -= $this->products[$id]["TongGia"];
        $this->totalDiscount -= $this->products[$id]["GiamGia"] * $this->products[$id]["SoLuong"];
        $this->SubTotal = $this->totalPrice - $this->totalDiscount;
        $this->Total = $this->SubTotal - $this->DiscountMember;
        unset($this->products[$id]);
    }

    public function quantityChange($id, $soluong)
    {
        if ($soluong > 0) {
            if ($this->products[$id]["CTSP"]->soluong < $soluong) {
                $soluong = $this->products[$id]["CTSP"]->soluong;
            }
            // trừ số liệu cũ.
            $this->totalQuanty -= $this->products[$id]["SoLuong"];
            $this->totalDiscount -= $this->products[$id]["GiamGia"] * $this->products[$id]["SoLuong"];
            $this->totalPrice -= $this->products[$id]["TongGia"];
            $this->SubTotal -= ($this->products[$id]["CTSP"]->giasanpham - $this->products[$id]["GiamGia"]) * $this->products[$id]["SoLuong"];
            // gắn lại số liệu mới.
            $this->products[$id]["SoLuong"] = $soluong;
            $this->products[$id]["TongGia"] = $this->products[$id]["CTSP"]->giasanpham * $soluong;
            // cộng số liệu mới.
            $this->totalQuanty += $this->products[$id]["SoLuong"];
            $this->totalDiscount += $this->products[$id]["GiamGia"] * $this->products[$id]["SoLuong"];
            $this->totalPrice += $this->products[$id]["TongGia"];
            $this->SubTotal += ($this->products[$id]["CTSP"]->giasanpham - $this->products[$id]["GiamGia"]) * $this->products[$id]["SoLuong"];
            $this->Total = $this->SubTotal - $this->DiscountMember;
        }
    }
    public function DiscountMember($DiscountMember, $PhoneMember)
    {
        // 1%       3%      5%          10%
        // 1,000    5,000   10,000     100,000

        if ($PhoneMember != null) {
            if ($DiscountMember >= 100000) {
                $this->PhoneMember = $PhoneMember;
                $this->DiscountMember = $this->SubTotal * 0.1;
            } elseif ($DiscountMember >= 10000) {
                $this->PhoneMember = $PhoneMember;
                $this->DiscountMember = $this->SubTotal * 0.05;
            } elseif ($DiscountMember >= 5000) {
                $this->PhoneMember = $PhoneMember;
                $this->DiscountMember = $this->SubTotal * 0.03;
            } elseif ($DiscountMember >= 1000) {
                $this->PhoneMember = $PhoneMember;
                $this->DiscountMember = $this->SubTotal * 0.01;
            } else {
                $this->PhoneMember = $PhoneMember;
                $this->DiscountMember = 0;
            }
        } else {
            $this->PhoneMember = "0000000000";
            $this->DiscountMember = 0;
        }
        $this->Total = $this->SubTotal - $this->DiscountMember;
    }
}
