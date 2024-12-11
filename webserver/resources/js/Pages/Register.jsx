import { useForm } from "@inertiajs/react";

export default function Register() {
    const { post, data, setData, errors, processing } = useForm({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        remember: false
    });

    const submit = () => {
        post('/register')
    }

    return (
        <form onSubmit={submit}>
        <input type="text" value={data.email} onChange={e => setData('name', e.target.value)} />
        <input type="text" value={data.email} onChange={e => setData('email', e.target.value)} />
        {errors.email && <div>{errors.email}</div>}
        <input type="password" value={data.password} onChange={e => setData('password', e.target.value)} />
        {errors.password && <div>{errors.password}</div>}
        <input type="password" value={data.email} onChange={e => setData('password_confirmation', e.target.value)} />

        <input type="checkbox" checked={data.remember} onChange={e => setData('remember', e.target.checked)} /> Remember Me
        <button type="submit" disabled={processing}>Login</button>
      </form>
    );
}