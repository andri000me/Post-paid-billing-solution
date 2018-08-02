mobNoInput.oninput = function () {
    if (this.value.length > 10) {
        this.value = this.value.slice(0,10); 
    }
}

function Validate() {
        var password = document.getElementById("pssd").value;
        var confirmPassword = document.getElementById("confirmPssd").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }