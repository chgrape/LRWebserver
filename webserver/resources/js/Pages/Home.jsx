
import { router, useForm } from "@inertiajs/react"

export default function Home() {
  
  const { data, setData, post, processing, errors } = useForm({
    email: 'burger10@gmail.com',
    password: 'a1234567',
    remember: false,
  })
  
  const handleLogin = (e) => {
    e.preventDefault()
    post('/login', {
      onSuccess: () => console.log('Logged in!'),
      onError: (errors) => console.log('Errors:', errors),
    })
  }

  const hadnleRedirect = (e) =>{
    e.preventDefault()
    post('/test')
  }

  return (
    <div>
        <button onClick={handleLogin}>Hello world</button>
        <button onClick={hadnleRedirect}>Redirect</button>
    </div>
  )
}