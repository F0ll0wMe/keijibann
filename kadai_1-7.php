<?PHP
  // �i���z��ե���������ָ��
  $file_name = "kadai_1-6.txt";
  // �ե������ȫ�����Ф�����
  $ret_array = file( $file_name );

  // ȡ�ä����ե�����ǩ`��(����)��ȫ�Ʊ�ʾ����
  for( $i = 0; $i < count($ret_array); ++$i ) {
    // ���Ф�혷��˱�ʾ����
    echo( $ret_array[$i] . "<br />\n" );
  }
?>