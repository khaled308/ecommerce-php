const links = document.querySelectorAll('a')
const editProfileForm = document.querySelector('.edit')

const membersIdData = Array.from(document.querySelectorAll('table td.id'))
const editMemberBtn = document.querySelectorAll('.edit-member')
const deleteMemberBtn = document.querySelectorAll('.delete-member')



const addMemberForm = document.querySelector('.add')
const table = document.querySelector('table')

links.forEach(link=>{
    const urlArr = location.href.split('/')

    if(!link.classList.contains('dropdown-toggle')){
        link.addEventListener('click',e=>{
            const URL = location.href

            // bad solution
            const lastChar = urlArr[urlArr.length - 1] 
            if(lastChar=== 'edit' || typeof Number(lastChar) === 'number'){
                e.preventDefault()

                const linkText = e.target.href.split('/')[urlArr.length - 1] 
                location.href = '/shop/admin/pages/' + linkText
            }

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




const URLMembers = '/shop/admin/pages/members';

if(membersIdData.length > 0){
    deleteMemberBtn.forEach((btn,index)=>{
        btn.addEventListener('click',()=>{
            fetch(`${URLMembers}?action=delete&id=${membersIdData[index].textContent}`)
            .then(res=>res.json())
            .then(data=>{
                if(data.status == 'ok'){
                    membersIdData.splice(index,1)
                    location.href = URLMembers ;
                }
            })
        })
    })

    editMemberBtn.forEach((btn,index)=>{
        btn.addEventListener('click',()=>{
            const id = membersIdData[index].textContent
            fetch(`${location.href}?action=edit&id=${id}`)
            .then(res=>res.json())
            .then(data=>{
                if(data.status == 'ok'){
                    membersIdData.splice(index,1)
                    location.href = URLMembers + `/edit?id=${id}`
                }
            })
        })
    })
}


const addMemberBtn = document.querySelector('.add-member')

if(addMemberBtn){
    addMemberBtn.addEventListener('click',(e)=>{
        if(addMemberForm.classList.contains('add-appear')){
            addMemberForm.classList.remove('add-appear')
            table.classList.remove('table-hide')
            e.target.innerHTML = `
            <i class="fa-solid fa-plus"></i>
            Add New Member
            `
        }
        else{
            addMemberForm.classList.add('add-appear')
            table.classList.add('table-hide')
            e.target.textContent = `View All Members`
        }
    })
}