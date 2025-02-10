import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from "@/components/ui/sidebar";

export function NavDashboard({ dashboard }) {
    return (
        <SidebarGroup className="group-data-[collapsible=icon]:hidden">
            <SidebarGroupLabel>Dashboard</SidebarGroupLabel>
            <SidebarMenu>
                <SidebarMenuItem key={dashboard.name}>
                    <SidebarMenuButton asChild>
                        <a href={dashboard.url}>
                            <dashboard.icon />
                            <span>{dashboard.name}</span>
                        </a>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarGroup>
    );
}
