import { usePage } from "@inertiajs/vue3";

export function useAuth() {
    const page = usePage();

    const hasRole = (name) => page.props.auth.user.roles.includes(name);
    const hasPermission = (name) =>
        page.props.auth.user.permission.includes(name);

    return {
        hasRole,
        hasPermission,
    };
}
