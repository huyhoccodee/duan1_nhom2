<?php
include_once 'pdo.php';
function payment_insert($id_don_hang, $amount, $payment_method, $payment_status)
{
    $sql = "INSERT INTO payment(id_don_hang, amount, payment_method, payment_status) VALUES (?,?,?,?)";
    pdo_execute($sql, $id_don_hang, $amount, $payment_method, $payment_status);
}
function payment_price($id_don_hang)
{
    $sql = "SELECT amount, payment_method FROM payment WHERE id_don_hang = ?";
    $result = pdo_query_one($sql, $id_don_hang);
    return $result['amount'];
}
