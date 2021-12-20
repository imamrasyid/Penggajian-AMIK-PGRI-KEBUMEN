function LoginPegawai(url, data) {
  if (url === "" || url === null) {
    ShowToast(2000, "warning", "Error: URL Not Defined.");
    return;
  } else {
    var formData = new FormData(data);

    for (var p of formData) {
      console.log(`Keys: ${p[0]} => ${p[1]}`);
    }

    // ButtonState("submit", "button", "Memproses...");

    // $.ajax({
    //   url: url,
    //   type: "POST",
    //   dataType: "JSON",
    //   data: formData,
    //   processData: false,
    //   contentType: false,
    //   success: (response) => {
    //     var GetString = JSON.stringify(response.data);
    //     var Result = JSON.parse(GetString);

    //     var GetString2 = JSON.stringify(response);
    //     var Result2 = JSON.parse(GetString2);

    //     if (Result2.status == 200) {
    //       if (Result.status == true) {
    //         ButtonState("submit", "submit", "Login");
    //         ShowToast(2000, "success", Result.message);
    //         setTimeout(() => {
    //           window.location = Result.endpoint_url;
    //         }, 2000);
    //       } else {
    //         ButtonState("submit", "submit", "Login");
    //         ShowToast(2000, "error", Result.message);
    //         return;
    //       }
    //     } else {
    //       ButtonState("submit", "submit", "Login");
    //       ShowToast(2000, "error", "Error: 403 Forbidden.");
    //       setTimeout(() => {
    //         window.location.reload();
    //       }, 2000);
    //     }
    //   },
    //   error: () => {
    //     ButtonState("submit", "submit", "Login");
    //     ShowToast(
    //       2000,
    //       "error",
    //       "Error: Server Terlalu Lama Merespon. Login Gagal."
    //     );
    //     setTimeout(() => {
    //       window.location.reload();
    //     }, 2000);
    //   },
    // });
  }
}
