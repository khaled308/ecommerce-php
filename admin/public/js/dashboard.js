const links = document.querySelectorAll('a')
const editProfileForm = document.querySelector('.edit')
const addMemberForm = document.querySelector('.add')


links.forEach(link=>{
    if(!link.classList.contains('dropdown-toggle')){
        link.addEventListener('click',e=>{
            const URL = location.href
    
            if(URL.includes(e.target.href)){
                e.preventDefault()
                location.reload()
            }
        })
    }
})


if(editProfileForm){
    const btn = document.querySelector('.edit-btn')
    btn.addEventListener('click',e=>{
        e.preventDefault()
        const URL = location.href
        fetch(URL,{
            method : 'POST',
            body : new FormData(editProfileForm)
        })
        .then(res=>res.json())
        .then(data=>{
            if(data.status == 'ok'){
                location.href = '/shop/admin/pages/dashboard'
            }
        })
    })
}

if(addMemberForm){
    const btn = document.querySelector('.add-btn')

    btn.addEventListener('click',e=>{
        e.preventDefault()
        const URL = location.href
        fetch(URL,{
            method : 'POST',
            body : new FormData(addMemberForm)
        })
        .then(res=>res.json())
        .then(data=>{
            if(data.status == 'ok'){
                location.href = '/shop/admin/pages/dashboard'
            }
        })
    })
}