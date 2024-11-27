<?php
include_once 'pdo.php';
function chat_insert($id_chat)
{
    $sql = "INSERT INTO chat(id_chat) VALUES (?)";
    pdo_execute($sql, $id_chat);
}
function chat_select()
{
    $sql = "SELECT * FROM chat ORDER BY time DESC";
    return pdo_query($sql);
}
function message_new($id_chat)
{
    $query = "SELECT * FROM message WHERE id_chat = ? ORDER BY id_message DESC LIMIT 1";
    return pdo_query_one($query, $id_chat);
}
function message_insert($id_chat, $id_send, $content)
{
    $sql = "INSERT INTO message(id_chat, id_send, content) VALUES (?,?,?)";
    pdo_execute($sql, $id_chat, $id_send, $content);
}
function message_select($id_chat)
{
    $sql = "SELECT * FROM message WHERE id_chat = ?";
    return pdo_query($sql, $id_chat);
}
