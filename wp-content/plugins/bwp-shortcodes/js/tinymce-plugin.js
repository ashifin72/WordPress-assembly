(function() {
  tinymce.PluginManager.add('bwpShortcodes', function(editor, url) {
    editor.addButton('bwpt_shortcodes_button', {
      title: 'bwp- Шорткоды',
      icon: 'icon bwp_shortcodes_icon',
      type: 'menubutton',
      menu: [
        // columns
        {
          text: 'Колонки',
          menu: [
            {
              text: '2 колонки',
              value: '[row][col_2]Первая колонка[/col_2][col_2]Вторая колонка[/col_2][/row]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '3 колонки',
              value: '[row][col_3]Первая колонка[/col_3][col_3]Вторая колонка[/col_3][col_3]Третья колонка[/col_3][/row]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '4 колонки',
              value: '[row][col_4]Первая колонка[/col_4][col_4]Вторая колонка[/col_4][col_4]Третья колонка[/col_4][col_4]Четвертая колонка[/col_4][/row]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
         
           
          ]
        },
        // end columns
        // information box
        {
          text: 'Информ. блок',
          menu: [
            {
              text: 'С фоном',
              value: '[info_bg pre_bg_color="red" pre_text_color="white" width="100%" text_align="left" hex_bg_color="" hex_text_color=""]Текст внутри инфо-блока[/info_bg]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: 'С бордюром',
              value: '[info_border pre_border_color="red" width="100%" text_align="left" hex_border_color="" hex_text_color=""]Текст внутри инфо-блока[/info_border]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            }
          ]
        },
        // end information box
        // highlight
        {
          text: 'Подсветка',
          value: '[highlight pre_bg_color="red" hex_bg_color="" hex_text_color=""]Текст[/highlight]',
          onclick: function() {
            editor.insertContent(this.value());
          }
        },
        // end highlight
        // button
        {
          text: 'Кнопка',
          value: '[button href="#" target="_blank" pre_bg_color="red"]Текст на кнопке[/button]',
          onclick: function() {
            editor.insertContent(this.value());
          }
        },
        // end button
        // divider
        {
          text: 'Разделитель',
          value: '[divider pre_color="red" type="solid" width="100%" height="1px" hex_color=""]',
          onclick: function() {
            editor.insertContent(this.value());
          }
        },
        // end divider
         
        // tabs
        {
          text: 'Вкладки',
          menu: [
            {
              text: '2 вкладки',
              value: '[tabs_container][tab title="Заголовок вкладки #1"]Текст 1-й вкладки[/tab][tab title="Заголовок вкладки #2"]Текст 2-й вкладки[/tab][/tabs_container]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '3 вкладки',
              value: '[tabs_container][tab title="Заголовок вкладки #1"]Текст 1-й вкладки[/tab][tab title="Заголовок вкладки #2"]Текст 2-й вкладки[/tab][tab title="Заголовок вкладки #3"]Текст 3-й вкладки[/tab][/tabs_container]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '4 вкладки',
              value: '[tabs_container][tab title="Заголовок вкладки #1"]Текст 1-й вкладки[/tab][tab title="Заголовок вкладки #2"]Текст 2-й вкладки[/tab][tab title="Заголовок вкладки #3"]Текст 3-й вкладки[/tab][tab title="Заголовок вкладки #4"]Текст 4-й вкладки[/tab][/tabs_container]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '5 вкладок',
              value: '[tabs_container][tab title="Заголовок вкладки #1"]Текст 1-й вкладки[/tab][tab title="Заголовок вкладки #2"]Текст 2-й вкладки[/tab][tab title="Заголовок вкладки #3"]Текст 3-й вкладки[/tab][tab title="Заголовок вкладки #4"]Текст 4-й вкладки[/tab][tab title="Заголовок вкладки #5"]Текст 5-й вкладки[/tab][/tabs_container]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '6 вкладок',
              value: '[tabs_container][tab title="Заголовок вкладки #1"]Текст 1-й вкладки[/tab][tab title="Заголовок вкладки #2"]Текст 2-й вкладки[/tab][tab title="Заголовок вкладки #3"]Текст 3-й вкладки[/tab][tab title="Заголовок вкладки #4"]Текст 4-й вкладки[/tab][tab title="Заголовок вкладки #5"]Текст 5-й вкладки[/tab][tab title="Заголовок вкладки #6"]Текст 6-й вкладки[/tab][/tabs_container]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            }
          ]
        },
        // end tabs
        // toggle
        {
          text: 'Спойлеры',
          value: '[toggle title="Заголовок спойлера"]Текст спойлера[/toggle]',
          onclick: function() {
            editor.insertContent(this.value());
          }
        },
        // end toggle
        // accordion
        {
          text: 'Аккордеон',
          menu: [
            {
              text: '2 секции',
              value: '[accordion][accordion_section title="Заголовок секции #1"]Текст 1-й секции[/accordion_section][accordion_section title="Заголовок секции #2"]Текст 2-й секции[/accordion_section][/accordion]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '3 секции',
              value: '[accordion][accordion_section title="Заголовок секции #1"]Текст 1-й секции[/accordion_section][accordion_section title="Заголовок секции #2"]Текст 2-й секции[/accordion_section][accordion_section title="Заголовок секции #3"]Текст 3-й секции[/accordion_section][/accordion]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '4 секции',
              value: '[accordion][accordion_section title="Заголовок секции #1"]Текст 1-й секции[/accordion_section][accordion_section title="Заголовок секции #2"]Текст 2-й секции[/accordion_section][accordion_section title="Заголовок секции #3"]Текст 3-й секции[/accordion_section][accordion_section title="Заголовок секции #4"]Текст 4-й секции[/accordion_section][/accordion]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '5 секций',
              value: '[accordion][accordion_section title="Заголовок секции #1"]Текст 1-й секции[/accordion_section][accordion_section title="Заголовок секции #2"]Текст 2-й секции[/accordion_section][accordion_section title="Заголовок секции #3"]Текст 3-й секции[/accordion_section][accordion_section title="Заголовок секции #4"]Текст 4-й секции[/accordion_section][accordion_section title="Заголовок секции #5"]Текст 5-й секции[/accordion_section][/accordion]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            },
            {
              text: '6 секций',
              value: '[accordion][accordion_section title="Заголовок секции #1"]Текст 1-й секции[/accordion_section][accordion_section title="Заголовок секции #2"]Текст 2-й секции[/accordion_section][accordion_section title="Заголовок секции #3"]Текст 3-й секции[/accordion_section][accordion_section title="Заголовок секции #4"]Текст 4-й секции[/accordion_section][accordion_section title="Заголовок секции #5"]Текст 5-й секции[/accordion_section][accordion_section title="Заголовок секции #6"]Текст 6-й секции[/accordion_section][/accordion]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }
            }
          ]
        }
        // end accordion
      ]
    });
  });
})();
