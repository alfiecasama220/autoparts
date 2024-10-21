function showToast() {
    const toast = document.getElementById('toast');
    const toastContainer = document.getElementById('toast-container');

    toast.classList.add('show');

    setTimeout(() => {
        toast.classList.remove('show');
        toastContainer.classList.add('hide');
    }, 3000);
}

function trigger() {
    showToast();
}


