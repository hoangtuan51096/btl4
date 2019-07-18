<!DOCTYPE html>
<html>
<head>
	<title>Thong bao het han</title>
</head>
<body>
Tai khoan {{ $book->users->account }} tai he thong BTL4 da het han muon quyen sach '{{ $book->books->name }}'<br/>
Quyen sach: {{ $book->books->name }} han thue la {{ $book->end_at }}
</body>
</html>