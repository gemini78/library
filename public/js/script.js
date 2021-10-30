function deleteElement(elem) 
{
    const response = confirm('Etes-vous sur de vouloir supprimmer ce livre ?');
    if (response) {
        var dataId = elem.getAttribute('data-id');
        document.location.href=`?page=delete-book&id=${dataId}`;
    }
}   