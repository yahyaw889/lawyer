<?php

namespace App\Enums;

enum ServiceType: string
{
    case LITIGATION = 'litigation';
    case CONTRACTS = 'contracts';
    case CONSULTATION = 'consultation';
    case SAUDI_INVEST = 'saudi_invest';
    case BUSINESS_SERVICES = 'business_services';
    case LEGAL_REPRESENTATION = 'legal_representation';
    case DOCUMENT_ATTESTATION = 'document_attestation';
    case CONSULTATION_REQUEST = 'consultation_request';

    // Attestation Sub-services
    case ATTESTATION_INTL_CONTRACT = 'attestation_intl_contract';
    case ATTESTATION_SIGNATURES = 'attestation_signatures';
    case ATTESTATION_POA_ISSUANCE = 'attestation_poa_issuance';
    case ATTESTATION_DEBT_ACK = 'attestation_debt_ack';
    case ATTESTATION_MOFA = 'attestation_mofa';
    case ATTESTATION_MOJ = 'attestation_moj';

    /**
     * Get the Arabic label for this service type.
     */
    public function labelAr(): string
    {
        return match ($this) {
            self::LITIGATION => 'التقاضي وتمثيل المحاكم',
            self::CONTRACTS => 'صياغة العقود',
            self::CONSULTATION => 'الاستشارات القانونية',
            self::SAUDI_INVEST => 'الاستثمار في السعودية',
            self::BUSINESS_SERVICES => 'خدمات أعمال و شركات',
            self::LEGAL_REPRESENTATION => 'تمثيل القانوني امام المحاكم',
            self::DOCUMENT_ATTESTATION => 'تمثيل و تصديق الوثائق',
            self::CONSULTATION_REQUEST => 'طلب استشارة',
            // Attestation Sub-services
            self::ATTESTATION_INTL_CONTRACT => 'دراسة وصياغة عقد دولي',
            self::ATTESTATION_SIGNATURES => 'تصديق امضائات أطراف العقد وتوثيقها',
            self::ATTESTATION_POA_ISSUANCE => 'اصدار الوكالات',
            self::ATTESTATION_DEBT_ACK => 'اصدار إقرار بالدين',
            self::ATTESTATION_MOFA => 'تصديق الوكالات لدى وزارة الخارجية',
            self::ATTESTATION_MOJ => 'تصديق الوكالات لدى وزارة العدل',
        };
    }

    /**
     * Get the localized label for this service type (uses current app locale).
     */
    public function label(): string
    {
        return __('frontend.services_list.items.' . $this->value);
    }

    /**
     * Get all cases as an array of [value => localized label].
     */
    public static function options(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }
        return $options;
    }
}
