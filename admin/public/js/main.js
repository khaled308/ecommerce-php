const btn = document.querySelector('.btn')


btn.addEventListener('click',e=>{
    e.preventDefault()
    const URL = location.href
    fetch(URL,{
        method : 'POST',
        body : new FormData(document.querySelector('form'))
    })
    .then(res=>res.json())
    .then(data=>{
        if(data.status === 'ok'){
            location.href = URL + 'pages/dashboard'
        }

    })
})