@extends('layout.default')
@section('content')
<style>
	#inputString{
		height: 45px;
	}
	.wrap {
		margin: 0 auto;
		width: 90%;
		max-width: 1140px;
		position: relative;
}
	#error {
display: none;
color: #E1704B;
}
	form textarea {
	height: 10em;
}
	form textarea, form input {
	border: none;
	padding: 1em;
	font-size: 1.2em;
	background: #eeeeee;
	color: #999999;
	width: 100%;
	-webkit-appearance: none;
}
	form textarea, form input, form button {
	font-family: "proxima-nova", "Helvetica", sans-serif;
}
	textarea {
	overflow: auto;
	vertical-align: top;
	resize: vertical;
}
    .col1 {
	display: inline-block;
	width: 50%;
	vertical-align: top;
	margin-right: 3em;
}
	.col2 {
	display: inline-block;
	width: 40%;
	text-align: center;
}
form input {
height: 1em;
margin-bottom: 1em;
}
button, input {
line-height: normal;
}
button.submit:hover {
background: #75C3BF;
}
button.submit {
border: none;
background: #39A9A4;
border-radius: 10px;
color: #ffffff;
padding: 2em 4em;
margin-top: 1em;
text-transform: uppercase;
letter-spacing: .1em;
font-size: .8em;
font-weight: 700;
}
</style>
<div style="margin-top:60px;">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.231455069023!2d106.80320206555608!3d10.869992543470072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbg!5e0!3m2!1svi!2s!4v1394609523587" width="1350" height="500" frameborder="0" style="border:0"></iframe>
</div>
<div class="wrap">
		<div id="contact-form-wrapper">	
		<h2>Gửi cho chúng tôi tin nhắn của bạn</h2>
		<form id="contact-form" method="POST" action="{{asset('contact')}}">
			<p id="error">Hãy điền đầy đủ thông tin của bạn</p>
			<fieldset>
				<div class="col1">
					<textarea name="message" id="message" title="Enter your message" placeholder="Viết nội dung tin nhắn ở đây" required></textarea>
				</div>
				<div class="col2">
					<input type="text" name="name" id="name" title="Enter your name" placeholder="Tên của bạn" required><br>
					<input type="email" name="email" id="email" title="Enter your email" placeholder="Email của bạn" required>
					<button class="submit" name="submit" type="submit" id="contact_submit">Gửi tin nhắn</button>
				</div>
			</fieldset>
		</form>
		</div>
	</div>
	{{HTML::script('public/js/classie-menu.js');}}
    {{HTML::script('public/js/gnmenu.js');}}
    <script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
	</script>
@endsection

