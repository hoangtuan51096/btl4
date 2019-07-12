<!DOCTYPE html>
<html>
<head>
	<title>Thong bao het han</title>
</head>
<body>
Tai khoan {{ $book->user->accont }} tai he thong BTL4 da het han muon quyen sach {{ $book->book->name }}<br/>
Quyen sach: {{ $book->book->name }} han thue la {{ $book->end_at }}
</body>
</html>