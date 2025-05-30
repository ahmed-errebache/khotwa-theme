<?php

namespace WPForms\SmartTags\SmartTag;

/**
 * Class FieldValueId.
 *
 * @since 1.6.7
 */
class FieldValueId extends SmartTag {

	/**
	 * Get smart tag value.
	 *
	 * @since 1.6.7
	 *
	 * @param array  $form_data Form data.
	 * @param array  $fields    List of fields.
	 * @param string $entry_id  Entry ID.
	 *
	 * @return string
	 */
	public function get_value( $form_data, $fields = [], $entry_id = '' ) {

		$attributes = $this->get_attributes();

		if ( ! isset( $attributes['field_value_id'] ) || $attributes['field_value_id'] === '' ) {
			return '';
		}

		$field_id = $attributes['field_value_id'];

		if ( ! isset( $fields[ $field_id ] ) || $fields[ $field_id ] === '' ) {
			return '';
		}

		$field_key = isset( $fields[ $field_id ]['value_raw'] ) && ! is_array( $fields[ $field_id ]['value_raw'] ) && (string) $fields[ $field_id ]['value_raw'] !== ''
			? 'value_raw'
			: 'value';

		$value = $this->get_formatted_field_value( (int) $field_id, (array) $fields, $field_key, $form_data );

		return wp_kses_post( wp_unslash( $value ) );
	}
}
