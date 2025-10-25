let deleteBtns = document.querySelectorAll(".delete_btn");
deleteBtns.forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        let id=btn.getAttribute('data-id');
        let actionName = btn.getAttribute('data-action');
        let confirmed = confirm("Rostdan ham o'chirmoqchimisiz");
        if(confirmed) {
            window.location.href = "?acontroller="+ actionName +"&id="+id;
        }
        
    })

    let success_alert = document.querySelector('.success_alert');

    if(success_alert) {
        setTimeout(function() {
            success_alert.style.display = "none";
        }, 1500)
    }

})


let error_alert = document.querySelector('.error_alert');

if(error_alert) {
    setTimeout(function() {
        error_alert.style.display = "none";
    }, 1500)
}