import { http } from '@/utils/http/axios';

export interface BasicResponseModel<T = any> {
  code: number;
  message: string;
  result: T;
}

export interface ApiResponseModel<T = any> {
  code: number;
  message: string;
  data: T;
}

export interface BasicPageParams {
  pageNumber: number;
  pageSize: number;
  total: number;
}

/**
 * @description: 获取用户信息
 */
export function getUserInfo() {
  return http.request({
    url: '/admin_info',
    method: 'get',
  });
}

/**
 * @description: 用户登录
 */
export function login(params) {
  return http.request<ApiResponseModel>(
    {
      url: '/user/login',
      method: 'POST',
      params,
    },
    {
      isTransformResponse: false,
    }
  );
}

export function getUserList(params){
  return http.request({
    url: '/user',
    method: 'GET',
    params,
  })
}

export function updateUser(id, data){
  return http.request(
    {
    url: `/user/${id}`,
    method: 'PUT',
    data
  }
  )
}

/**
 * @description: 用户修改密码
 */
export function changePassword(params, uid) {
  return http.request(
    {
      url: `/user/u${uid}/changepw`,
      method: 'POST',
      params,
    },
    {
      isTransformResponse: false,
    }
  );
}

/**
 * @description: 用户登出
 */
export function logout(params) {
  return http.request({
    url: '/login/logout',
    method: 'POST',
    params,
  });
}
