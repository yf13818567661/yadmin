<template>
  <div>
    <n-card :bordered="false" class="proCard">
      <BasicTable
        :columns="columns"
        :request="loadDataTable"
        :actionColumn="actionColumn"
        @edit-end="editEnd"
        @edit-change="onEditChange"
        :row-key="(row) => row.id"
        ref="actionRef"
        @update:checked-row-keys="onCheckedRow"
      >
        <template #tableTitle>
          <n-button type="primary">
            <template #icon>
              <n-icon>
                <PlusOutlined />
              </n-icon>
            </template>
            添加用户
          </n-button>
        </template>
      </BasicTable>
    </n-card>
  </div>
</template>
<script setup lang="ts">

import { columns } from '@/views/system/user/columns'
import { BasicTable, TableAction } from '@/components/Table'
import { h, reactive, ref, unref } from 'vue'
import { getUserList, updateUser } from '@/api/system/user'
import { PlusOutlined } from '@vicons/antd'
import { Result } from '@/utils/http/axios/types'
import { useMessage } from 'naive-ui'

const params = reactive({
  pageSize: 5,
  name: 'user'
})

const actionRef = ref();
const message = useMessage()

const loadDataTable = async (res: any) => {
  const _params = {
    ...unref(params),
    ...res
  }
  return await getUserList(_params)
}

function onCheckedRow(rowKeys: any[]) {
  console.log(rowKeys)
}
const actionColumn = reactive({
  width: 150,
  title: '操作',
  key: 'action',
  fixed: 'right',
  align: 'center',
  render(record) {
    return h(TableAction, {
      style: 'button',
      actions: createActions(record),
    });
  },
});
function createActions(record) {
  return [
    {
      label: '重置密码',
      onClick: () => {
        console.log(record)
      },
    }
  ]
}
async function editEnd({ record, index, key, value }) {
  let { id } = record
  try {
    record = await updateUser(id,{ [key]:value })
    message.success('修改成功')
  }catch (e: any) {
    message.error(e.message)
  }
}
function onEditChange({ column, value, record }) {
  if (column.key === 'id') {
    record.editValueRefs.name4.value = `${value}`;
  }
  console.log(record, value)
}
</script>
<style scoped lang="less">

</style>
