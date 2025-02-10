import { Head } from '@inertiajs/react'
import AdminLayout from '../../Layouts/AdminLayout'

export default function Index({ event }) {
  return (
    <AdminLayout>
        <Head title="Dashboard" />

        <h1>Dashboard</h1>
        <p>Welcome back, {event.name}!</p>
    </AdminLayout>
  )
}
