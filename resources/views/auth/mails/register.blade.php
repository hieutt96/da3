<body>
	Chào bạn {{ $user->lastName }},<br>
		<br>
		Cám ơn bạn đã đăng kí và sử dụng dịch vụ của chúng tôi.<br>
		Tài khoản của bạn đã được tạo trên hệ thống<br>
		<br>
		Vui lòng truy cập đường link bên dưới để kích hoạt tài khoản<br>
		<br>
		Link: {{ route('register_confirm', $token) }}
		<br>
	</div>
</body>