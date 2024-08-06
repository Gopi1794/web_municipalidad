document.getElementById('otroPaisCheckbox').addEventListener('change', function() {
    const isChecked = this.checked;
    document.getElementById('provinciaDiv').classList.toggle('hidden', isChecked);
    document.getElementById('municipalidadDiv').classList.toggle('hidden', isChecked);
    document.getElementById('localidadDiv').classList.toggle('hidden', isChecked);
});