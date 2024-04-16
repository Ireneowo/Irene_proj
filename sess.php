<?php
# 查看 session 的所有內容

session_start();

echo json_encode($_SESSION);