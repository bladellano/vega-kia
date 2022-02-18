$(function () {

    const params = new URLSearchParams(window.location);

    if (!params.has('search'))
        return;

    let textToSearch = params.get('search').split('=')[1];
    let paragraph = document.querySelectorAll('.tableSearch tr td a');
    let pattern = new RegExp(`${textToSearch}`, "gi");

    paragraph.forEach(
        function (currentValue) {
            textToSearch = textToSearch.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
            currentValue.innerHTML = currentValue.textContent.replace(pattern, match => `<mark>${match}</mark>`);
        }
    );
});