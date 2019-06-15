
function task(e)
{
    let xhr = new XMLHttpReuqest();
    xhr.open("POST", "", true); // 2nd arg is link
    xhr.setRequestHeader('Content-Type', 'application/json');
    let is_done = e.target.checked;

    xhr.send(JSON.stringify({
	'is_done' = is_done;
    }));
}

