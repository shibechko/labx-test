(function() {
    let form = document.getElementById('reg-form');
    let url = form.getAttribute('action');
    form.onsubmit = async () => {
        e.preventDefault();
        let data = new FormData(form);
        
    }
})();
