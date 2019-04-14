function cancel() {
if (confirm('Do you want to come back?')) 
    window.open("../welcome/welcome.html");
}

function chinh_sua() {
	var ds_phong = [100, 101];
	var te = prompt("Nhập mã phòng: ");
	for (var i = ds_phong.length - 1; i >= 0; i--) {
		if (te == ds_phong[i]) {
		window.open("");
		break;
	}
	}
	if (i < 0) {alert("Mã phòng không tồn tại.")};
}
