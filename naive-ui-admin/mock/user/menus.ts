import { resultSuccess } from '../_util';

const menusList = [
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: 'LAYOUT',
    redirect: '/dashboard/console',
    meta: {
      icon: 'DashboardOutlined',
      title: 'Dashboard',
    },
    children: [
      {
        path: 'console',
        name: 'dashboard_console',
        component: '/dashboard/console/console',
        meta: {
          title: '主控台',
        },
      },
      {
        path: 'monitor',
        name: 'dashboard_monitor',
        component: '/dashboard/monitor/monitor',
        meta: {
          title: '监控页',
        },
      },
      {
        path: 'workplace',
        name: 'dashboard_workplace',
        component: '/dashboard/workplace/workplace',
        meta: {
          title: '工作台',
        },
      },
    ],
  },
  {
    path: '/about',
    name: 'about',
    component: 'LAYOUT',
    meta: {

    },
    children: [
      {
        path: 'index',
        name: `about_index`,
        component: '/about/index',
        meta: {
          title: '关于项目',
          activeMenu: 'about_index',
        },
      },
    ],
  },
];

export default [
  {
    url: '/api/menus',
    timeout: 1000,
    method: 'get',
    response: () => {
      return resultSuccess(menusList);
    },
  },
];
