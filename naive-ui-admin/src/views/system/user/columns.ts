export const columns = [
  {
    title: 'id',
    key: 'id',
  },
  {
    title: '编码',
    key: 'username',
  },
  {
    title: '用户名',
    key: 'name',
    editComponent: 'NInput',
    editRule: true,
    edit: true,
  },
  {
    title: '是否启用',
    key: 'status',
    edit: true,
    editComponent: 'NSelect',
    editComponentProps: {
      options: [
        {
          label: '冻结',
          value: 0,
        },{
          label: '启用',
          value: 1,
        }
      ],
    },
  },
  {
    title: '创建时间',
    key: 'created_at',
  },
  {
    title: '更新时间',
    key: 'updated_at',
  },
];
