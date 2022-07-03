$(() => {
    navScrollTop()
    hljs.initHighlighting();
})

$(document).scroll(() => {
    navScrollTop()
})

function navScrollTop() {
    if ($(document).scrollTop() > 100) {
        $('#header').addClass('fixed-top')
        $('#site-title').addClass('d-lg-block')
        $('#site-desc').addClass('d-lg-block')
        $('#header').addClass('border-bottom')
        $('#header').css("max-width", "100%")
        $('#main').css("margin-top", "100px")
        $('#nav-placeholder').hide()
    } else {
        $('#header').removeClass('fixed-top')
        $('#site-title').removeClass('d-lg-block')
        $('#site-desc').removeClass('d-lg-block')
        $('#header').removeClass('border-bottom')
        $('#header').css("max-width", "1172px")
        $('#main').css("margin-top", "0px")
        $('#nav-placeholder').show()
    }
}

function modalQrcode() {
    var myModal = new bootstrap.Modal(document.getElementById('modalQrcode'), {})
    myModal.show()
}