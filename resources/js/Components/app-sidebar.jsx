import * as React from "react";
import { Gauge, Truck, HandCoins } from "lucide-react";
import { NavMain } from "@/components/nav-main";
import { NavUser } from "@/components/nav-user";
import {
    Sidebar,
    SidebarMenu,
    SidebarMenuItem,
    SidebarMenuButton,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarRail,
} from "@/components/ui/sidebar";
import { usePage } from "@inertiajs/react";
import { NavDashboard } from "./nav-dashboard";

const data = {
    dashboard: {
        name: "Dashboard",
        url: route("dashboard"),
        icon: Gauge,
        isActive: route().current("dashboard"),
    },
    navMain: [
        {
            title: "Transactions",
            url: "#",
            icon: HandCoins,
            isActive: route().current("transactions.*"),
            items: [
                {
                    title: "Incomes",
                    url: route("transactions.incomes.index"),
                    isActive: route().current("incomes.*"),
                },
                {
                    title: "Expenses",
                    url: route("transactions.expenses.index"),
                    isActive: route().current("expenses.*"),
                },
            ],
        },
    ],
};

export function AppSidebar({ ...props }) {
    const user = usePage().props.auth.user;
    user.avatar = "/avatars/shadcn.jpg";

    return (
        <Sidebar collapsible="icon" {...props}>
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <a href="#">
                                <div className="flex aspect-square size-8 items-center justify-center rounded-lg bg-sidebar-primary text-sidebar-primary-foreground">
                                    <Truck className="size-4" />
                                </div>
                                <div className="flex flex-col gap-0.5 leading-none">
                                    <span className="font-semibold">
                                        BM Transport
                                    </span>
                                </div>
                            </a>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>
            <SidebarContent>
                <NavDashboard dashboard={data.dashboard} />
                <NavMain items={data.navMain} />
            </SidebarContent>
            <SidebarFooter>
                <NavUser user={user} />
            </SidebarFooter>
            <SidebarRail />
        </Sidebar>
    );
}
